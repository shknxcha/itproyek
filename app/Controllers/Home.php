<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('freeuser/header');
        echo view('freeuser/home/page');
        echo view('freeuser/footer');
    }
    public function profil()
    {
        echo view('freeuser/header');
        echo view('freeuser/home/profil');
        echo view('freeuser/footer');
    }

    public function informasi()
    {
        echo view('freeuser/header');
        echo view('freeuser/home/informasi');
        echo view('freeuser/footer');
    }
    public function testimoni()
    {
        echo view('freeuser/header');
        echo view('freeuser/home/testimoni');
        echo view('freeuser/footer');
    }
    public function galeri()
    {
        echo view('freeuser/header');
        echo view('freeuser/home/galeri');
        echo view('freeuser/footer');
    }
}