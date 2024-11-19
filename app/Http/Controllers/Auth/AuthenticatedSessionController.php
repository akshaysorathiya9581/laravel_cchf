<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Models\Seasons;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // if (Auth::check()) {
        //     return redirect()->route('home');
        // }
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        
        $request->session()->regenerate();
        
        // if ($user->role == 'customer') {
        // }
        return response()->json(['status' => true, 'message' => "Login successful!"]);
    }

    /**
     * Handle an incoming API authentication request.
     */
    public function apiLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.',
            ], 422);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        $latestSeason = Seasons::latest()->first();
        $seasonId = $latestSeason ? $latestSeason->id : null;

        if ($seasonId) {
            $request->session()->put('season_id', $seasonId);
        }
        return response()->json(['access_token' => $token, 'token_type' => 'Bearer','season_id' => $seasonId]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect('/');
        return redirect()->intended('/'); // or use 'home' if you have that route defined
        
    }

    /**
     * Destroy an authenticated API session.
     */
    public function apiLogout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
