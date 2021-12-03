<?php

namespace App\Controllers;

use Config\Database;
use CodeIgniter\I18n\Time;
use App\Models\ModelPeminjaman;
use App\Controllers\BaseController;

class Mybook extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->model = new ModelPeminjaman();
    }
    public function index()
    {
        $id = user_id();
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('book_loan_list.id as loanId,book_title,for_class,qrcode,categories,book_id,code,loan_status,return_status,loan_date,date_of_return,tanggal_dikembalikan');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $this->builder->where('user_id', $id);
        $query = $this->builder->get();


        $data = [
            'title' => 'My Book',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $query->getResult()
        ];
        return view('buku/backend/mybook/index', $data);
    }
    public function histori(){
        $id = user_id();
        $this->builder = $this->db->table('histori');
        $this->builder->select('histori.id as loanId,book_title,for_class,categories,book_id,date_loan,date_return');
        $this->builder->join('book_list', 'book_list.id = histori.book_id');
        $this->builder->where('user_id', $id);
        $query = $this->builder->get();
        $data = [
            'title' => 'My Book Histori',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $query->getResult()
        ];
        return view('buku/backend/mybook/histori', $data);
    }
}
