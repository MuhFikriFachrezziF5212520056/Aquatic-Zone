<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Menolak permintaan ke halaman yang dilindungi bila belum login.
 * Dipasang via alias 'auth' di Config\Filters -> aquascape/*
 */
class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('isLoggedIn')) {
            // simpan tujuan supaya setelah login user kembali ke halaman itu
            session()->set('redirect_after_login', current_url());

            return redirect()->to(site_url('login'))
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}