<?php

namespace App\Controllers;

use Config\Database;
use CodeIgniter\I18n\Time;
use App\Models\ModelPeminjaman;
use App\Controllers\BaseController;

class Konfirmasi extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->model = new ModelPeminjaman();
    }
    public function index()
    {
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('book_loan_list.id as loanId,book_title,for_class,categories,book_id,code,loan_status,return_status,loan_date,date_of_return,fullname,username,user_id');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $this->builder->join('users', 'users.id = book_loan_list.user_id');
        $this->builder->where('loan_status', 0);
        $this->builder->orderby('loanId', 'DESC');
        $query = $this->builder->get();
        $data = [
            'title' => 'Data Buku',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $query->getResult()
        ];
        return view('konfirmasi/index', $data);
    }
    public function code()
    {
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('book_loan_list.id as loanId,book_title,for_class,categories,book_id,code,loan_status,return_status,loan_date,date_of_return,fullname,username,user_id');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $this->builder->join('users', 'users.id = book_loan_list.user_id');
        $query = $this->builder->get();
        $data = [
            'title' => 'Konfirmasi Peminjaman',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $query->getResult()
        ];
        return view('konfirmasi/code', $data);
    }
    public function qrcode()
    {
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('book_loan_list.id as loanId,book_title,for_class,categories,book_id,code,loan_status,return_status,loan_date,date_of_return,fullname,username,user_id');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $this->builder->join('users', 'users.id = book_loan_list.user_id');
        $query = $this->builder->get();
        $data = [
            'title' => 'Konfirmasi Peminjaman',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $query->getResult()
        ];
        return view('konfirmasi/qrcode', $data);
    }
    public function qr_code_confirm()
    {
        $result = $this->mRequest->getVar('result');
        $hasil = $this->model->search_book_loan($result);

        if ($hasil) {
            $this->builder = $this->db->table('book_loan_list');
            $this->builder->select('*');
            $this->builder->where('code', $result);
            $query = $this->builder->get()->getRow();
            if ($query) {
                $id = $query->id;
                $user_id = $query->user_id;
                $loan_status = $query->loan_status;
                $Ddate = $this->mRequest->getVar('Ddate');
                $Ldate = Time::now('Asia/Jakarta', 'en_US');
                $Rdate = $Ldate->addDays($Ddate);

                if ($loan_status == 1) {
                    $data2 = [
                        'user_id' => $user_id,
                        'status' => 0,
                        'judul' => 'Pesan Konfirmasi Buku',
                        'content' => 'Gagal, Buku anda gagal terkonfirmasi oleh staff perpustakaan <br> Silahkan Hubungi Staff Perpustakaan',
                        'date_created' => $this->time,
                    ];

                    $this->builder = $this->db->table('notif');
                    $this->builder->select('*');
                    $this->builder->insert($data2);

                    session()->setFlashdata('gagal', 'Gagal! Data sudah ada!');
                    return redirect()->to('/konfirmasi/qrcode');
                } else {
                    $data = [
                        'loan_status' => 1,
                        'loan_date' => $Ldate,
                        'date_of_return' => $Rdate,
                    ];
                    $this->model->update($id, $data);

                    $data2 = [
                        'user_id' => $user_id,
                        'status' => 0,
                        'judul' => 'Pesan Konfirmasi Buku',
                        'content' => 'Selamat, Buku anda telah terkonfirmasi oleh staff perpustakaan <br> Kembalikan Buku pada ' . $Rdate,
                        'date_created' => $this->time,
                    ];

                    $this->builder = $this->db->table('notif');
                    $this->builder->select('*');
                    $this->builder->insert($data2);


                    session()->setFlashdata('pesan', 'Berhasil Konfirmasi Data');
                    return redirect()->to('/konfirmasi/qrcode');
                }
            } else {

                session()->setFlashdata('gagal', 'Gagal! Data tidak falid');
                return redirect()->to('/konfirmasi/qrcode');
            }
        } else {
            session()->setFlashdata('gagal', 'Gagal! Data tidak falid');
            return redirect()->to('/konfirmasi/qrcode');
        }
    }
    public function search_code()
    {
        $code = $this->mRequest->getVar('code');
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('book_loan_list.id as loanId,book_title,for_class,categories,book_id,code,loan_status,return_status,loan_date,date_of_return,fullname,username,user_id');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $this->builder->join('users', 'users.id = book_loan_list.user_id');
        $this->builder->where('code', $code);
        $query = $this->builder->get();
        $data = [
            'title' => 'Konfirmasi Peminjaman',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $query->getResult(),
            'code' => $code
        ];
        return view('konfirmasi/searchCode', $data);
    }
}
