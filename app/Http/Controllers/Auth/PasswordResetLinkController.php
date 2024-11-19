<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
         $validator = \Validator::make($request->all(), [
            'email' => ['required', 'email'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->toArray()
            ]);
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            return response()->json([
                'status' => true,
                'message' => __('We have emailed your password reset link!'),
            ]);
        } elseif ($status == Password::INVALID_USER) {
            return response()->json([
                'status' => false,
                'message' => __("We can't find a user with that email address."),
            ], 404);
        }

        // Fallback response in case something else goes wrong
        return response()->json([
            'status' => false,
            'message' => __('Failed to send password reset link. Please try again.'),
        ], 500); // 500 status for internal server error
    }
}
