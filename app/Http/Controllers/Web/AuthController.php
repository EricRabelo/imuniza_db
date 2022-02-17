<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

	public function index()
	{
		return view('auth.login');
	}

	public function login(Request $request)
	{
		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();

			return redirect()->intended('admin.home');
		}

		return back()->withErrors([
			'email' => 'Essas credenciais não correspondem com os nossos registros.',
		]);
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('admin.home');
	}
}
