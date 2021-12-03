<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table                = 'users';
    protected $protectFields        = true;
    protected $allowedFields        = ['username','image','fullname','kelas','jurusan','qrcode_status','user_code'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    
    public function getUser($username)
    {
        if($username == false) {
            return $this->findAll();
        }

        return $this->where(['username' => $username])->first();
    }
    public function search_user($id)
    {
        $this->builder = $this->db->table('users');
        $this->builder->select('*');
        $this->builder->where('user_code', $id);
        $query = $this->builder->get();

        return $query->getRow();
    }
    public function cek_id($id)
    {
        $this->builder = $this->db->table('poin');
        $this->builder->select('*');
        $this->builder->where('user_id', $id);
        $query = $this->builder->get();

        return $query->getRow();
    }
    public function get_poin($id)
    {
        $this->builder = $this->db->table('poin');
        $this->builder->select('*');
        $this->builder->where('user_id', $id);
        $query = $this->builder->get();

        return $query->getRow();
    }
    public function userActive()
    {
        return $this->where(['active' => 1])->findAll();
    }
}
