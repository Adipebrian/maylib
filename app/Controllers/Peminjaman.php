<?php

namespace App\Controllers;

use Config\Database;
use CodeIgniter\I18n\Time;
use App\Models\ModelPeminjaman;
use App\Controllers\BaseController;
use App\Models\ModelUser;

class Peminjaman extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->model = new ModelPeminjaman();
        $this->modelUser = new ModelUser();
    }

    public function qrcode()
    {
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('book_loan_list.id as loanId,book_title,for_class,categories,book_id,code,loan_status,return_status,loan_date,date_of_return,user_id');
        $this->builder->join('book_list', 'book_list.id = book_loan_list.book_id');
        $query = $this->builder->get();
        $data = [
            'title' => 'Peminjaman',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $query->getResult()
        ];
        return view('buku/backend/mybook/qrcode', $data);
    }
    public function qrcode_confirm()
    {
        $id_user = user_id();
        $result = $this->mRequest->getVar('result');
        $random = random_string('numeric', 6);

        $this->builder = $this->db->table('book_list');
        $this->builder->select('*');
        $this->builder->where('id', $result);
        $query = $this->builder->get()->getRow();

        $hasil = $this->model->search_book_loan($result);
        if ($query) {
            if ($hasil) {
                $data = [
                    'user_id' => $id_user,
                    'status' => 0,
                    'judul' => 'Pesan Penambahan Buku',
                    'content' => 'Gagal, Anda Gagal Meminjam Buku Karena Data Sudah Ada </br> Silahkan Hubungi Staff Perpustakaan',
                    'date_created' => $this->time,
                ];

                $this->builder = $this->db->table('notif');
                $this->builder->select('*');
                $this->builder->insert($data);
                session()->setFlashdata('gagal', ' Gagal!, Data sudah ada!');
                return redirect()->to('mybook/qrcode_loan');
            } else {
                $title = $query->book_title;
                $class = $query->for_class;
                $this->model->save([
                    'book_id' => $result,
                    'user_id' => $id_user,
                    'code' => $random,
                    'loan_status' => 0,
                    'return_status' => 0,
                    'loan_date' => 0,
                    'date_of_return' => 0,
                ]);
                $data = [
                    'user_id' => $id_user,
                    'status' => 0,
                    'judul' => 'Pesan Penambahan Buku',
                    'content' => 'Selamat, Anda Berhasil Meminjam Buku ' . $title . ' Untuk Kelas ' . $class . '</br> Silahkan Konfirmasi Peminjaman Anda Ke Staff Perpustakaan',
                    'date_created' => $this->time,
                ];

                $this->builder = $this->db->table('notif');
                $this->builder->select('*');
                $this->builder->insert($data);

                session()->setFlashdata('pesan', 'Data berhasil di tambahkan');
                return redirect()->to('mybook/qrcode_loan');
                dd($hasil);
            }
        } else {
            $data = [
                'user_id' => $id_user,
                'status' => 0,
                'judul' => 'Pesan Penambahan Buku',
                'content' => 'Gagal, Anda Gagal Meminjam Buku Karena Qrcode Salah </br> Silahkan Hubungi Staff Perpustakaan',
                'date_created' => $this->time,
            ];

            $this->builder = $this->db->table('notif');
            $this->builder->select('*');
            $this->builder->insert($data);
            session()->setFlashdata('gagal', ' Gagal! Data tidak falid!');
            return redirect()->to('mybook/qrcode_loan');
        }
    }
    public function store()
    {
        $id_user = user_id();
        $id = $this->mRequest->getVar('id');
        $random = random_string('numeric', 6);

        $this->builder = $this->db->table('book_list');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $query = $this->builder->get()->getRow();
        $title = $query->book_title;
        $class = $query->for_class;

        $hasil = $this->model->search_book_loan_id($id);
        if ($hasil) {
            session()->setFlashdata('gagal', 'Gagal! Data sudah ada!');
            return redirect()->to('/home/detail/' . $id);
        } elseif ($query) {
            $this->model->save([
                'book_id' => $id,
                'user_id' => $id_user,
                'code' => $random,
                'loan_status' => 0,
                'return_status' => 0,
                'loan_date' => 0,
                'date_of_return' => 0,
            ]);
            $data = [
                'user_id' => $id_user,
                'status' => 0,
                'judul' => 'Pesan Penambahan Buku',
                'content' => 'Selamat, Anda Berhasil Meminjam Buku ' . $title . ' Untuk Kelas ' . $class . '</br> Silahkan Konfirmasi Peminjaman Anda Ke Staff Perpustakaan',
                'date_created' => $this->time,
            ];

            $this->builder = $this->db->table('notif');
            $this->builder->select('*');
            $this->builder->insert($data);

            session()->setFlashdata('pesan', 'Data berhasil di tambahkan');
            return redirect()->to('/home/detail/' . $id);
        } else {
            $data = [
                'user_id' => $id_user,
                'status' => 0,
                'judul' => 'Pesan Penambahan Buku',
                'content' => 'Gagal, Anda Gagal Meminjam Buku ' . $title . ' Untuk Kelas ' . $class . '</br> Silahkan Hubungi Staff Perpustakaan',
                'date_created' => $this->time,
            ];

            $this->builder = $this->db->table('notif');
            $this->builder->select('*');
            $this->builder->insert($data);
            session()->setFlashdata('gagal', ' Gagal! Data tidak falid!');
            return redirect()->to('/home/detail/' . $id);
        }
    }
    public function update_loan()
    {
        $id_loan = $this->mRequest->getVar('id');
        $user_id = $this->mRequest->getVar('user_id');
        $Mdate = $this->mRequest->getVar('Mdate');
        $Ddate = $this->mRequest->getVar('Ddate');
        $Ldate = Time::now('Asia/Jakarta', 'en_US');
        if ($Mdate) {
            $Rdate = $Ldate->addMonths($Mdate);
        } else {
            $Rdate = $Ldate->addDays($Ddate);
        }
        $data = [
            'loan_status' => 1,
            'loan_date' => $Ldate,
            'date_of_return' => $Rdate,
        ];
        $this->model->update($id_loan, $data);

        $data2 = [
            'user_id' => $user_id,
            'status' => 0,
            'judul' => 'Pesan Konfirmasi Buku',
            'content' => 'Selamat, Buku anda telah terkonfirmasi oleh staff perpustakaan <br> Kembalikan Buku pada tanggal ' . $Rdate,
            'date_created' => $this->time,
        ];

        $this->builder = $this->db->table('notif');
        $this->builder->select('*');
        $this->builder->insert($data2);
        session()->setFlashdata('pesan', 'Data berhasil di Konfirmasi');
        return redirect()->to('/konfirmasi/index');
    }
    public function update_return()
    {
        $id_loan = $this->mRequest->getVar('id');
        $user_id = $this->mRequest->getVar('user_id');
        $book_id = $this->mRequest->getVar('book_id');
        $date_loan = $this->mRequest->getVar('date_loan');
        $date = Time::now('Asia/Jakarta', 'en_US');
        $data = [
            'return_status' => 1,
            'tanggal_dikembalikan' => $date,
        ];
        $this->model->update($id_loan, $data);

        $data2 = [
            'user_id' => $user_id,
            'status' => 0,
            'judul' => 'Pesan Konfirmasi Buku',
            'content' => 'Selamat, Anda telah berhasil mengembalikan buku ke perpustakaan <br> Ayo pinjam buku lagi untuk masa depan yang lebih cerah! ',
            'date_created' => $this->time,
        ];

        $this->builder = $this->db->table('notif');
        $this->builder->select('*');
        $this->builder->insert($data2);

        // hapus data di book_loan_list
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('*');
        $this->builder->where('id', $id_loan);
        $this->builder->delete();

        // tambah data ke histori
        $data3 = [
            'user_id' => $user_id,
            'book_id' => $book_id,
            'date_loan' => $date_loan,
            'date_return' => $date,
        ];
        $this->builder = $this->db->table('histori');
        $this->builder->select('*');
        $this->builder->insert($data3);

        // POIN

        // cek userid apakah ada
        $cek_id = $this->modelUser->cek_id($user_id);
        $telat = $this->mRequest->getVar('telat');
        if ($cek_id) {
            // poin
            $Resultpoin = $this->modelUser->get_poin($user_id);
            $poin = $Resultpoin->poin;
            // jika id ada => update
            // jika telat pengembaliannya berarti dikurangi 10
            if ($telat < 0) {
                $data = [
                    'poin' => $poin - 10,
                    'date_created' => $this->time,
                ];
            } else {
                $data = [
                    'poin' => $poin + 10,
                    'date_created' => $this->time,
                ];
            }
            $this->builder = $this->db->table('poin');
            $this->builder->select('*');
            $this->builder->where('user_id', $user_id);
            $this->builder->update($data);

            if ($telat < 0) {
                $data2 = [
                    'user_id' => $user_id,
                    'status' => 0,
                    'judul' => 'Pesan Pengurangan Poin',
                    'content' => 'Gagal, Anda mendapatkan pengurangan 10 poin dari Pengembalian Buku pada tanggal ' . $this->time . ' karena telat pengembalian ' . abs($telat) . ' hari',
                    'date_created' => $this->time,
                ];
            } else {
                $data2 = [
                    'user_id' => $user_id,
                    'status' => 0,
                    'judul' => 'Pesan Penambahan Poin',
                    'content' => 'Selamat, Anda mendapatkan 10 poin dari Pengembalian Buku pada tanggal ' . $this->time,
                    'date_created' => $this->time,
                ];
            }

            $this->builder = $this->db->table('notif');
            $this->builder->select('*');
            $this->builder->insert($data2);


            session()->setFlashdata('pesan', 'Data berhasil di Update');
            return redirect()->to('/pengembalian/index');
        } else {
            // jika id tidak ada => tambah
            // jika telat pengembaliannya berarti dikurangi 10
            if ($telat < 0) {
                $data = [
                    'user_id' => $user_id,
                    'poin' => -10,
                    'date_created' => $this->time,
                ];
            } else {
                $data = [
                    'user_id' => $user_id,
                    'poin' => 10,
                    'date_created' => $this->time,
                ];
            }
            $this->builder = $this->db->table('poin');
            $this->builder->select('*');
            $this->builder->insert($data);

            if ($telat < 0) {
                $data2 = [
                    'user_id' => $user_id,
                    'status' => 0,
                    'judul' => 'Pesan Pengurangan Poin',
                    'content' => 'Gagal, Anda mendapatkan pengurangan 10 poin dari Pengembalian Buku pada tanggal ' . $this->time . ' karena telat pengembalian' . abs($telat) . ' hari',
                    'date_created' => $this->time,
                ];
            } else {
                $data2 = [
                    'user_id' => $user_id,
                    'status' => 0,
                    'judul' => 'Pesan Penambahan Poin',
                    'content' => 'Selamat, Anda mendapatkan 10 poin dari Pengembalian Buku pada tanggal ' . $this->time,
                    'date_created' => $this->time,
                ];
            }
            session()->setFlashdata('pesan', 'Data berhasil di Update');
            return redirect()->to('/pengembalian/index');
        }
    }
}
