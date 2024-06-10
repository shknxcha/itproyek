<?php

namespace App\Controllers;

use App\Models\Pesanmodel;

class Pesanan extends BaseController
{
    public function index()
    {
        $Pesanmodel = new Pesanmodel();
        $data['pesanan'] = $Pesanmodel->findAll();
        
        return view('pesanan/tabelPesanan', $data);
    }

    public function create()
    {
        return view('pesanan/create');
    }

    public function store()
    {
        $Pesanmodel = new Pesanmodel();
        $data = [
            'jumlah_pesanan' => $this->request->getPost('jumlah_pesanan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'total_harga' => $this->request->getPost('total_harga'),
            'id_pengguna' => $this->request->getPost('id_pengguna'),
        ];
        $Pesanmodel->insert($data);

        return redirect()->to('/pesanan');
    }

    public function edit($id)
    {
        $Pesanmodel = new Pesanmodel();
        $data['pesanan'] = $Pesanmodel->find($id);

        return view('pesanan/edit', $data);
    }

    public function update($id)
    {
        $Pesanmodel = new Pesanmodel();
        $data = [
            'jumlah_pesanan' => $this->request->getPost('jumlah_pesanan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'total_harga' => $this->request->getPost('total_harga'),
            'id_pengguna' => $this->request->getPost('id_pengguna'),
        ];
        $Pesanmodel->update($id, $data);

        return redirect()->to('/pesanan');
    }

    public function delete($id)
    {
        $Pesanmodel = new Pesanmodel();
        $Pesanmodel->delete($id);

        return redirect()->to('/pesanan');
    }
}