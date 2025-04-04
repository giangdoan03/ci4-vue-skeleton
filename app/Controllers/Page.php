<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function home()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        return redirect()->to('/dashboard');
    }

    public function login()
    {
        // Nếu đã login thì vào dashboard luôn
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        return view('pages/login');
    }

    public function register()
    {
        // Nếu đã login thì về dashboard luôn
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        return view('pages/register');
    }

    public function dashboard()
    {
        // Nếu chưa login thì bắt buộc login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('pages/home'); // home.php là dashboard của bạn
    }
}
