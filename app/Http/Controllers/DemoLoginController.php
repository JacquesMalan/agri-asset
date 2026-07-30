<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class DemoLoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $guestUser = User::query()
            ->where('email', config('demo.guest_email'))
            ->firstOrFail();

        Auth::login($guestUser);

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }
}
