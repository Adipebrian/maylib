<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
    protected $table                = 'book_list';
    protected $protectFields        = true;
    protected $allowedFields        = ['id','for_class','jurusan','categories','book_title','cover','description','penulis','penerbit','tahun_terbit','isbn','qr_status'];
    

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    public function getBook($id)
    {
        return $this->where(['id' => $id])->first();
    }
}
