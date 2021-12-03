<?php

namespace App\Controllers;

use Config\Database;
use App\Models\ModelPeminjaman;
use App\Controllers\BaseController;

class PushNotif extends BaseController
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
        $this->builder->select('book_loan_list.id as loanId,email,book_title,for_class,categories,book_id,code,loan_status,return_status,loan_date,date_of_return,fullname,username,user_id,email_status');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $this->builder->join('users', 'users.id = book_loan_list.user_id');
        $this->builder->where('return_status', 0);
        $this->builder->where('email_status', 0);
        $this->builder->orderby('email_status', 'ASC');
        $query = $this->builder->get();
        $data = [
            'title' => 'Push Notifikation',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'time' => $this->time,
            'books' => $query->getResult()
        ];
        return view('buku/pushnotif', $data);
    }
    public function send()
    {
        $user_id = $this->mRequest->getVar('user_id');
        $id = $this->mRequest->getVar('id');
        $email_user = $this->mRequest->getVar('email');
        $email = \Config\Services::email();

        $email->setTo($email_user);

        $email->setSubject('Email Pengingat');
        $email->setMessage('Waktu anda mengembalikan buku tinggal 3 hari lagi, Segera kembalikan buku ke perpustakaan sebelum terlambat!');

        $email->send();

        $data = [
            'email_status' => 1,
        ];
        $this->model->update($id, $data);


        $data2 = [
            'user_id' => $user_id,
            'status' => 0,
            'judul' => 'Pesan Pengembalian Buku',
            'content' => 'Waktu anda mengembalikan buku tinggal 3 hari lagi, Segera kembalikan buku ke perpustakaan sebelum terlambat!',
            'date_created' => $this->time,
        ];

        $this->builder = $this->db->table('notif');
        $this->builder->select('*');
        $this->builder->insert($data2);


        session()->setFlashdata('pesan', 'Berhasil! Email Berhasil Terkirim!');
        return redirect()->to('/buku/pushNotif');
    }
    public function pushall()
    {
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('book_loan_list.id as loanId,email,email_status,user_id');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $this->builder->join('users', 'users.id = book_loan_list.user_id');
        $this->builder->limit(5);
        $this->builder->where('return_status', 0);
        $this->builder->where('email_status', 0);
        $query = $this->builder->get()->getResult();
        // dd($query);
        if ($query) {
            foreach ($query as $q) {
                $emails = $q->email;
                $loanId = $q->loanId;
            }
            $this->send_email($emails, $loanId);
            session()->setFlashdata('pesan', 'Berhasil! Email Berhasil Terkirim!');
            return redirect()->to('/pushnotif/pushall');
        } else {
            session()->setFlashdata('pesan', 'Done! Email Berhasil Terkirim Semua!');
            return redirect()->to('/buku/pushNotif');
        }
    }
    private function send_email($emails, $loanId)
    {
        $email = \Config\Services::email();
        $email->clear();
        $email->setTo($emails);

        $email->setSubject('Email Pengingat');
        $email->setMessage('Waktu anda mengembalikan buku sebentar lagi, Segera kembalikan buku ke perpustakaan sebelum terlambat!');

        $email->send();

        $data = [
            'email_status' => 1,
        ];
        return $this->model->update($loanId, $data);
    }
}
