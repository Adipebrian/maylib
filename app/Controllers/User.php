<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->userModel = new ModelUser();
    }
    public function index()
    {
        $id = user_id();
        $this->builder = $this->db->table('users');
        $this->builder->select('users.id as userid,username,email,name,image,fullname,jurusan,kelas,qrcode_status,user_code');
        $this->builder->where('users.id', $id);
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $this->builder = $this->db->table('poin');
        $this->builder->select('*');
        $this->builder->where('user_id', $id);
        $poin = $this->builder->get()->getRow();
        if(!$poin){
            $poinResult = 0;
        }else{
            $poinResult = $poin->poin;
        }
        $data = [
            'title' => 'User',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'user' => $query->getRow(),
            'poin' => $poinResult,
            'validation' => \Config\Services::validation(),
        ];
        return view('user/index', $data);
    }
    public function update($id)
    {
        // cek judulnya
        $UsernameLama = $this->userModel->getUser($this->mRequest->getVar('fullname'));
        if ($UsernameLama['fullname'] == $this->mRequest->getVar('fullname')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[users.fullname]|alpha_dash';
        }

        if (!$this->validate([
            'fullname' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => ' fullname harus diisi.',
                    'is_unique' => ' fullname sudah ada',
                    'alpha_dash' => 'jangan spasi(ganti dengan -,_)'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/JPG]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/user')->withInput();
        };

        $fileFoto = $this->mRequest->getFile('foto');

        // cek gambar apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->mRequest->getVar('fotoLama');
        } else {
            // generate nama file
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar
            $fileFoto->move('img', $namaFoto);
            // hapus gambar lama
            if ($this->mRequest->getVar('fotoLama') != 'default.png') {
                unlink('img/' . $this->mRequest->getVar('fotoLama'));
            }
        }
        $data = [
            'fullname' => $this->mRequest->getVar('fullname'),
            'image' => $namaFoto
        ];
        $this->userModel->update($id, $data);

        session()->setFlashdata('pesan', 'Data berhasil di ubah');
        return redirect()->to('/user');
    }
}
