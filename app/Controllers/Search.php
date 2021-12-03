<?php

namespace App\Controllers;

use Config\Database;
use App\Models\ModelBuku;
use App\Controllers\BaseController;

class Search extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->model = new ModelBuku();
    }
    public function index()
    {
        $key = $this->mRequest->getVar('key');
        $kategori = $this->mRequest->getVar('kategori');
        $jurusan = $this->mRequest->getVar('jurusan');
        $kelas = $this->mRequest->getVar('kelas');
        if($key == null){
            $key = '';
        }
        if($kategori == null){
            $kategori = '';
        }
        if($jurusan == null){
            $jurusan = '';
        }
        if($kelas == null){
            $kelas = '';
        }

        $this->builder = $this->db->table('book_list');
        $this->builder->select('*');
        $this->builder->like('book_title',$key);
        $this->builder->like('categories',$kategori);
        $this->builder->like('for_class',$kelas);
        $this->builder->like('jurusan',$jurusan);
        $query = $this->builder->get()->getResult();

        $data = [
            'key' => $key,
            'hasil' => $query,
            'kategori' => $kategori,
            'kelas' => $kelas,
            'jurusan' => $jurusan,
        ];

        return view('home/search', $data);
    }
}
