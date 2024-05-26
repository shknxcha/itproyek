<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index()
    {
        echo view('admin/header');
        echo view('tambahProfil');
        echo view('admin/footer');
    }
}