<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'book_loan_list';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id', 'user_id', 'book_id', 'code', 'qrcode', 'loan_status', 'return_status', 'loan_date', 'email_status', 'date_of_return', 'tanggal_dikembalikan'];


    public function search_book_loan($result)
    {
        $id_user = user_id();
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('*');
        $this->builder->where('user_id', $id_user);
        $this->builder->where('code', $result);
        return $this->builder->get()->getRow();
    }
    public function search_book_loan_id($result)
    {
        $id_user = user_id();
        $this->builder = $this->db->table('book_loan_list');
        $this->builder->select('*');
        $this->builder->where('user_id', $id_user);
        $this->builder->where('book_id', $result);
        return $this->builder->get()->getRow();
    }
}
