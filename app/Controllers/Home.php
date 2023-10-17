<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (!session()->has('logged_in')) {
            // Jika belum login, arahkan ke halaman login
            return redirect()->to('/login');
        }
        return view('auth/index');
    }
}