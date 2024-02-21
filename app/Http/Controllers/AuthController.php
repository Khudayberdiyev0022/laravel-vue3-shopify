<?php

namespace App\Http\Controllers;

use App\Events\LoginEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
  public function login(): View
  {
    return view('login');
  }

  public function loginStore(Request $request): RedirectResponse
  {
    $data          = $request->validate([
      'email'    => 'required|string|email|max:64',
      'password' => 'required|string|min:6|max:64',
    ]);

    $data['admin'] = true;

    if (auth()->attempt($data)) {
      $user = auth()->user();

      event(new LoginEvent($user));
      return redirect()->intended('home');
    }


//    LoginEvent::dispatch($user);
    return back()->withErrors(['email' => __('auth.failed')]);
  }

  public function logout(): RedirectResponse
  {
    auth()->logout();

    return redirect()->route('login');
  }
}
