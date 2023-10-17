<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function index()
    {
        // Hapus sesi pengguna
        session()->destroy();

        // Redirect ke halaman login atau halaman lain yang sesuai
        return redirect()->to('/login');
    }
}