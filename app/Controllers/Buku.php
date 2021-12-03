<?php

namespace App\Controllers;

use Config\Database;
use Config\Services;
use App\Models\ModelBuku;
use App\Controllers\BaseController;

class Buku extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->builder = $this->db->table('book_list');
        $this->model = new ModelBuku();
    }
    public function index()
    {
        $this->builder = $this->db->table('book_list');
        $this->builder->select('*');
        $book = $this->builder->countAllResults();

        $this->builder = $this->db->table('book_list');
        $this->builder->select('*');
        $this->builder->orderby('id', 'DESC');
        $books = $this->builder->get()->getResult();

        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('*');
        $this->builder->where('loan_status', 1);
        $loan = $this->builder->countAllResults();

        $this->builder = $this->db->table('users');
        $this->builder->select('*');
        $this->builder->where('active', 1);
        $anggota = $this->builder->countAllResults();

        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('*');
        $this->builder->where('return_status', 0);
        $return = $this->builder->countAllResults();
        $data = [
            'title' => 'Dashboard',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'book' => $book,
            'books' => $books,
            'loan' => $loan,
            'anggota' => $anggota,
            'return' => $return,
        ];
        return view('buku/backend/index', $data);
    }
    public function histori()
    {
        $this->builder = $this->db->table('histori');
        $this->builder->select('histori.id as historiId,book_title,for_class,categories,book_id,date_loan,date_return,fullname');
        $this->builder->join('book_list', 'book_list.id = histori.book_id');
        $this->builder->join('users', 'users.id = histori.user_id');
        $this->builder->orderBy('historiId', 'DESC');
        $query = $this->builder->get();
        $data = [
            'title' => 'Data Histori Buku',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $query->getResult()
        ];
        return view('buku/backend/histori', $data);
    }
    public function list()
    {
        $this->builder = $this->db->table('book_list');
        $this->builder->select('*');
        $this->builder->orderby('id', 'DESC');
        $books = $this->builder->get()->getResult();
        $data = [
            'title' => 'List Book',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'books' => $books
        ];
        return view('buku/backend/list', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Add Book',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'validation' => Services::validation(),
        ];
        return view('buku/backend/bukuAdd', $data);
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Book',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'validation' => Services::validation(),
            'book' => $this->model->getBook($id)
        ];
        return view('buku/backend/bukuEdit', $data);
    }
    public function store()
    {
        $judul = $this->mRequest->getVar('judul');
        $kelas = $this->mRequest->getVar('kelas');
        $jurusan = $this->mRequest->getVar('jurusan');
        $categories = $this->mRequest->getVar('categories');
        $penulis = $this->mRequest->getVar('penulis');
        $penerbit = $this->mRequest->getVar('penerbit');
        $thn_terbit = $this->mRequest->getVar('thn_terbit');
        $isbn = $this->mRequest->getVar('isbn');
        $deskripsi = $this->mRequest->getVar('deskripsi');
        $coverFile = $this->mRequest->getFile('cover');
        // generate nama file
        $namaCover = $coverFile->getRandomName();
        // pindahkan gambar
        $coverFile->move('img/buku', $namaCover);


        $this->model->save([
            'book_title' => $judul,
            'for_class' => $kelas,
            'categories' => $categories,
            'jurusan' => $jurusan,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun_terbit' => $thn_terbit,
            'isbn' => $isbn,
            'cover' => $namaCover,
            'description' => $deskripsi,
            'qr_status' => 0,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di Tambahkan');
        return redirect()->to('/buku/list');
    }
    public function update()
    {
        $coverFile = $this->mRequest->getFile('cover');

        // cek gambar apakah tetap gambar lama
        if ($coverFile->getError() == 4) {
            $namaCover = $this->mRequest->getVar('coverLama');
        } else {
            // generate nama file
            $namaCover = $coverFile->getRandomName();
            // pindahkan gambar
            $coverFile->move('img/buku/', $namaCover);
            // hapus gambar lama
            if ($this->mRequest->getVar('coverLama') != 'default.png') {
                unlink('img/buku/' . $this->mRequest->getVar('coverLama'));
            }
        }
        $id = $this->mRequest->getVar('id');
        $judul = $this->mRequest->getVar('judul');
        $kelas = $this->mRequest->getVar('kelas');
        $categories = $this->mRequest->getVar('categories');
        $penulis = $this->mRequest->getVar('penulis');
        $penerbit = $this->mRequest->getVar('penerbit');
        $thn_terbit = $this->mRequest->getVar('thn_terbit');
        $isbn = $this->mRequest->getVar('isbn');
        $jurusan = $this->mRequest->getVar('jurusan');
        $deskripsi = $this->mRequest->getVar('deskripsi');
        $data = [
            'book_title' => $judul,
            'for_class' => $kelas,
            'categories' => $categories,
            'jurusan' => $jurusan,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun_terbit' => $thn_terbit,
            'isbn' => $isbn,
            'cover' => $namaCover,
            'description' => $deskripsi,
            'qr_status' => 0,
        ];
        $this->model->update($id, $data);

        session()->setFlashdata('pesan', 'Data berhasil di Ubah');
        return redirect()->to('/buku/list');
    }
    public function delete()
    {
        $id = $this->mRequest->getVar('id');
        $this->model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di Hapus');
        return redirect()->to('/buku/list');
    }
}
