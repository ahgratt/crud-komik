<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class Login extends BaseController
{
    public function index()
    {
        $data = [];

        if (session()->getFlashdata('error')) {
            $data['error'] = session()->getFlashdata('error');
        }

        return view('login_view', $data);
    }


    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // $password = password_hash($password, PASSWORD_DEFAULT);
        // return $password;

        // Memanggil model untuk mencari data pengguna berdasarkan username
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Jika pengguna ditemukan, verifikasi kata sandi
            if (password_verify($password, $user['password'])) {
                // Login berhasil
                // Login berhasil, buat sesi pengguna
                $session = session();
                $session->set('user_id', $user['id']);
                $session->set('username', $user['username']);
                $session->set('logged_in', true); // Tambahkan ini
                // Disini Anda dapat menetapkan sesi atau melakukan tindakan lain yang sesuai
                return redirect()->to('/'); // Ganti '/dashboard' dengan halaman setelah login berhasil.
            } else {
                // Kata sandi tidak sesuai
                return redirect()->to('/login')->with('error', 'Password salah');
            }
        } else {
            // Pengguna tidak ditemukan
            return redirect()->to('/login')->with('error', 'Username tidak ditemukan');
        }
    }
}