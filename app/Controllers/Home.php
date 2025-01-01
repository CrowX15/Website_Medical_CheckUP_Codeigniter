<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        //return view('Login/v_login.php');
        //return view('admin/dashboard.php');
        //return view('dokter/dashboard.php');
        //return view('laboratorium/dashboard.php');
        //return view('radiologi/dashboard.php');
        return view('loket/dashboard.php');
    }
}
