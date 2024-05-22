<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        echo view('admin/header');
        echo view('dashboard');
        echo view('admin/footer');
    }
}