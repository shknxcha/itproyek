<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Profil extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProfilModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Profil',
            'profile' => $this->model->findAll(),
        ];

        return view('profil/tabelProfil', $data);
    }

    public function updateProfil($id)
{
    // Ambil file gambar dan ikon dari request
    $gambar = $this->request->getFile('gambar');
    $ikon = $this->request->getFile('ikon');
    $gambar_lama = $this->request->getPost('gambar_lama');
    $ikon_lama = $this->request->getPost('ikon_lama');

    // Jika file gambar baru diunggah, valid dan belum dipindah maka pindahkan file gambar
    if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
        $namagambar = $gambar->getRandomName();
        $gambar->move(FCPATH . 'gambar_profil', $namagambar);
        if ($gambar_lama != 'default.jpg' && file_exists(FCPATH . 'gambar_profil/' . $gambar_lama)) {
            if (is_file(FCPATH . 'gambar_profil/' . $gambar_lama)) {
                unlink(FCPATH . 'gambar_profil/' . $gambar_lama);
            } else {
                error_log("Error: " . FCPATH . 'gambar_profil/' . $gambar_lama . " is not a file.");
            }
        }
    } else {
        $namagambar = $gambar_lama;
    }

    // Jika file ikon baru diunggah, valid dan belum dipindah maka pindahkan file ikon
    if ($ikon && $ikon->isValid() && !$ikon->hasMoved()) {
        $namaikon = $ikon->getRandomName();
        $ikon->move(FCPATH . 'gambar_profil', $namaikon);
        if ($ikon_lama != 'default.jpg' && file_exists(FCPATH . 'gambar_profil/' . $ikon_lama)) {
            if (is_file(FCPATH . 'gambar_profil/' . $ikon_lama)) {
                unlink(FCPATH . 'gambar_profil/' . $ikon_lama);
            } else {
                error_log("Error: " . FCPATH . 'gambar_profil/' . $ikon_lama . " is not a file.");
            }
        }
    } else {
        $namaikon = $ikon_lama;
    }

    // Data yang akan disimpan ke dalam database
    $data = [
        'id_profile' => $id,
        'gambar' => $namagambar,
        'ikon' => $namaikon,
        'uraian' => $this->request->getPost('uraian'),
        'keterangan' => $this->request->getPost('keterangan'),
        'judul' => $this->request->getPost('judul')
    ];

    // Simpan data ke dalam database
    $this->model->save($data);
    return redirect()->to('/dataProfil')->with('success', 'Data berhasil diperbarui');
}


    public function edit($id)
    {
        $data = [
            'title' => 'Edit Profil',
            'profile' => [$this->model->find($id)],
        ];

        return view('profil/tabelProfil', $data);
    }
}

