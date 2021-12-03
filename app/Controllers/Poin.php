<?php

namespace App\Controllers;

use Config\Database;
use App\Models\ModelUser;
use App\Controllers\BaseController;

class Poin extends BaseController
{
    public function __construct()
    {
        $this->db = Database::connect();
        $this->model = new ModelUser();
    }
    public function index()
    {
        $this->builder = $this->db->table('poin');
        $this->builder->select('*');
        $this->builder->join('users', 'users.id = poin.user_id');
        $this->builder->orderby('poin', 'DESC');
        $query = $this->builder->get()->getResult();
        $data = [
            'title' => 'Poin',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'poin' => $query
        ];
        return view('poin/index', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Absensi',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
        ];
        return view('poin/qrcode', $data);
    }
    public function store()
    {
        $result = $this->mRequest->getVar('result');
        // cek isi nya
        $hasil = $this->model->search_user($result);
        // jika hasilnya ada
        if ($hasil) {
            // ambil id
            $id_user = $hasil->id;
            // cek userid apakah ada
            $cek_id = $this->model->cek_id($id_user);
            if ($cek_id) {
                // poin
                $Resultpoin = $this->model->get_poin($id_user);
                $poin = $Resultpoin->poin;
                // jika id ada => update
                $data = [
                    'poin' => $poin + 10,
                    'date_created' => $this->time,
                ];
                $this->builder = $this->db->table('poin');
                $this->builder->select('*');
                $this->builder->where('user_id', $id_user);
                $this->builder->update($data);
                $data2 = [
                    'user_id' => $id_user,
                    'status' => 0,
                    'judul' => 'Pesan Penambahan Poin',
                    'content' => 'Selamat, Anda mendapatkan 10 poin dari Absensi pada tanggal ' . $this->time,
                    'date_created' => $this->time,
                ];

                $this->builder = $this->db->table('notif');
                $this->builder->select('*');
                $this->builder->insert($data2);

                session()->setFlashdata('pesan', 'Selamat, Anda mendapatkan 10 poin!');
                return redirect()->to('/buku/absensi');
            } else {
                // jika id tidak ada => tambah
                $data = [
                    'user_id' => $id_user,
                    'poin' => 10,
                    'date_created' => $this->time,
                ];
                $this->builder = $this->db->table('poin');
                $this->builder->select('*');
                $this->builder->insert($data);

                $data2 = [
                    'user_id' => $id_user,
                    'status' => 0,
                    'judul' => 'Pesan Penambahan Poin',
                    'content' => 'Selamat, Anda mendapatkan 10 poin dari Absensi pada tanggal ' . $this->time,
                    'date_created' => $this->time,
                ];

                $this->builder = $this->db->table('notif');
                $this->builder->select('*');
                $this->builder->insert($data2);
                session()->setFlashdata('pesan', 'Berhasil, Anda mendapatkan 10 poin!');
                return redirect()->to('/buku/absensi');
            }
        } else {
            session()->setFlashdata('gagal', ' Gagal, Anda gagal mendapatkan poin!');
            return redirect()->to('/buku/absensi');
        }
    }
    public function delete()
    {
        $this->builder = $this->db->table('poin');
        $this->builder->select('*');
        $this->builder->truncate();
        session()->setFlashdata('pesan', 'Berhasil, Data berhasil di Reset!');
        return redirect()->to('/buku/poin');
    }
}
