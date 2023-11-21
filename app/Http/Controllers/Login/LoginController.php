<?php

namespace App\Http\Controllers\Login;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Email harus dalam format yang valid.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Periksa level pengguna dan tentukan redirect yang sesuai
            $redirectPath = $this->getRedirectPath(Auth::user()->level);

            return redirect()->intended($redirectPath)->with('toast_success', 'Anda berhasil login!');
        } else {
            // Jika autentikasi gagal, tampilkan pesan error
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        // return view('pelanggan.dahsboard.index');
        return redirect('/');
    }

    /**
     * Get the path to redirect to based on the user's level.
     *
     * @param string $userLevel
     * @return string
     */
    protected function getRedirectPath($userLevel)
    {
        switch ($userLevel) {
            case 'Admin':
            case 'Barberman':
                return '/dashboard';
                // Add more cases for other user levels if needed
            default:
                return '/';
        }
    }
}
