<?php

namespace App\Controllers;

use Config\Database;
use App\Models\ModelBuku;
use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        return view('home/index');
    }
    public function index_login()
    {
        $this->builder = $this->db->table('book_list');
        $this->builder->select('*');
        $this->builder->limit(10);
        $query = $this->builder->get()->getResult();

        $data = [
            'books' => $query,
            'limit' => 10
        ];
        return view('home/index_login', $data);
    }
    public function show_result($limit)
    {
        $this->builder = $this->db->table('book_list');
        $this->builder->select('*');
        $this->builder->limit($limit);
        $query = $this->builder->get()->getResult();

        $data = [
            'books' => $query,
            'limit' => $limit
        ];
        return view('home/index', $data);
    }
    public function about()
    {
        return view('home/about');
    }
    public function show_more()
    {
        $tambah = 5;
        $limit = $this->uri->getSegment(2);
        $hasil = $tambah + $limit;
        return redirect()->to('/show_result/' . $hasil);
    }
    public function detail($id)
    {
        $this->builder = $this->db->table('book_list');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $query = $this->builder->get();

        $data = [
            'book' => $query->getRow()
        ];
        return view('home/detail', $data);
    }
}
