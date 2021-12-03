<?php

namespace App\Controllers;
use Config\Database;
use App\Controllers\BaseController;
use App\Models\ModelUser;

class Anggota extends BaseController
{
    public function __construct()
    {
        $this->db = Database::connect();
        $this->model = new ModelUser();
    }
    public function index()
    {
        $anggota = $this->model->findAll();
        $data = [
            'title' => 'Anggota',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'anggota' => $anggota
        ];
        return view('buku/anggota/index', $data);
    }
    public function detail()
    {
        $anggota = $this->model->findAll();
        $data = [
            'title' => 'Anggota',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'anggota' => $anggota
        ];
        return view('buku/anggota/detail', $data);
    }
    public function detail_anggota($kelas,$jurusan)
    {
        $this->builder = $this->db->table('users');
        $this->builder->select('*');
        $this->builder->where('kelas',$kelas);
        $this->builder->where('jurusan',$jurusan);
        $query = $this->builder->get()->getResult();
        $data = [
            'title' => 'Detail Anggota',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'detail' => $query
        ];
        return view('buku/anggota/detail_anggota', $data);
    }
    public function detail_buku($id)
    {
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('*');
        $this->builder->select('book_loan_list.id as loanId,book_title,for_class,categories,book_id,code,loan_status,return_status,loan_date,date_of_return');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $this->builder->where('user_id',$id);
        $query = $this->builder->get()->getResult();
        $data = [
            'title' => 'Detail Anggota',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $query
        ];
        return view('buku/anggota/detail_buku', $data);
    }
}
