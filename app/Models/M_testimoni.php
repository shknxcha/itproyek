<?php

namespace App\Models;

use CodeIgniter\Model;

class M_testimoni extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey = 'id_testimoni';
    protected $allowedFields = ['gambar', 'uraian', 'id_pengguna']; // pastikan id_pengguna ada di sini
    protected $returnType = 'object';

    public function tambah($data)
    {
        // Cek apakah id_pengguna ada di tabel pengguna
        $pengguna = $this->db->table('pengguna')->where('id_pengguna', $data['id_pengguna'])->get()->getRow();
        if (!$pengguna) {
            throw new \Exception("id_pengguna tidak ditemukan di tabel pengguna");
        }

        // Jika valid, masukkan data ke tabel testimoni
        $this->insert($data);
    }

    public function edit($id, $data)
    {
        $this->update($id, $data);
    }

    public function hapus($id)
    {
        $this->delete($id);
    }

    public function getProdukList()
    {
        return $this->db->table('produk')->select('id_produk, produk')->get()->getResultArray();
    }

    public function getPenggunaList()
    {
        return $this->db->table('pengguna')->select('id_pengguna, nama')->get()->getResultArray();
    }
}
