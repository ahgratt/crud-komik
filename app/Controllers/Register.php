<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        return view('register_view');
    }

    public function process()
    {
        $password = $this->request->getPost('password');
        $password = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $password,
        ];


        // Simpan pengguna ke dalam database
        $userModel = new UserModel();
        $userModel->insertUser($data);

        // Redirect ke halaman login atau halaman lain yang sesuai
        return redirect()->to('/login');
    }
}