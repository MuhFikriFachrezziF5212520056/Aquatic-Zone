<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // arahkan sesuai status login
        if (session()->get('isLoggedIn')) {
            return redirect()->to(site_url('aquascape'));
        }

        return redirect()->to(site_url('login'));
    }
}
