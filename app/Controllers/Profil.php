<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Profil extends BaseController
{
    public function index()
    {
        $model = new ProfilModel();
        $data['profile'] = $model->findAll();
       
        return view('profil/tabelProfil', $data);
    }

    public function getProfilData($id_profile)
    {
        $model = new ProfilModel();
        $data = $model->find($id_profile);
        return $this->response->setJSON($data);
    }

    public function saveProfil()
    {
        $model = new ProfilModel();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'uraian' => $this->request->getPost('uraian'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        if ($file = $this->request->getFile('ikon')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newName);
                $data['ikon'] = $newName;
            }
        }

        if ($file = $this->request->getFile('gambar')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newName);
                $data['gambar'] = $newName;
            }
        }

        $model->save($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function updateProfil($id_profile)
    {
        $model = new ProfilModel();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'uraian' => $this->request->getPost('uraian'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        if ($file = $this->request->getFile('ikon')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newName);
                $data['ikon'] = $newName;
            }
        }

        if ($file = $this->request->getFile('gambar')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newName);
                $data['gambar'] = $newName;
            }
        }

        $model->update($id_profile, $data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function hapusProfil($id_profile)
    {
        $model = new ProfilModel();
        $model->delete($id_profile);
        return $this->response->setJSON(['status' => 'success']);
    }
}