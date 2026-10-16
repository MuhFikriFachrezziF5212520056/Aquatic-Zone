<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Auth extends BaseController
{
    protected PenggunaModel $penggunaModel;

    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }

    public function login()
    {
        // sudah login? langsung ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('aquascape'));
        }

        return view('auth/login', ['title' => 'Login — AquaticZone']);
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required|trim',
            'password' => 'required',
        ];

        $errors = [];

        if (! $this->validate($rules, $errors)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $errors);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->penggunaModel->cariUsername($username);

        // pesan sengaja sama untuk username salah maupun password salah
        if ($user === null || ! password_verify($password, $user['password_hash'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username atau password salah.');
        }

        // login berhasil -> simpan profil di session
        session()->set([
            'user_id'    => $user['id_pengguna'],
            'nama'       => $user['nama_lengkap'],
            'role'       => $user['role'],
            'isLoggedIn' => true,
        ]);

        // kembali ke halaman yang tadi ditolak, kalau ada
        $tujuan = session()->get('redirect_after_login') ?? site_url('aquascape');
        session()->remove('redirect_after_login');

        return redirect()->to($tujuan);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'));
    }
}