<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\Seasons;

class AdminLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {   
        $this->ensureIsNotRateLimited();
        if (! Auth::guard('admin')->attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            $latestSeason = Seasons::latest()->first();
            $seasonId = $latestSeason ? $latestSeason->id : null;
    
            if ($seasonId) {
                request()->session()->put('season_id', $seasonId);
            }
            
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        // Retrieve the authenticated user via the web guard
        $user = Auth::guard('admin')->user();

        // dd($user);
         // Check if the user's role is 'customer'
        if ($user->role == 'customer') {
             Auth::guard('admin')->logout(); // Log out the user if the role is invalid
 
              // Custom error message for failed login attempt
             throw ValidationException::withMessages([
                 'email' => [
                     'status' => false,
                     'message' => 'The provided email or password is incorrect.',
                 ],
             ]);
             // throw ValidationException::withMessages([
             //     'email' => __('auth.role_not_allowed'),
             // ]);
        }
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}