<?php

namespace App\Controllers;

use Config\Database;
use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;

class Notif extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $userid = user_id();
        $this->builder = $this->db->table('notif');
        $this->builder->select('*');
        $this->builder->where('user_id', $userid);
        $this->builder->orderBy('id', 'DESC');
        $query = $this->builder->get()->getResult();


        $data = [
            'title' => 'Notifikasi',
            'uri' => $this->uri,
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'result' => $query,
            'time' => $this->time
        ];
        return view('notif/index', $data);
    }
    public function detail($id)
    {

        $this->builder = $this->db->table('notif');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $query = $this->builder->get()->getRow();

        $update = [
            'status' => 1,
        ];

        $this->builder = $this->db->table('notif');
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->update($update);

        $data = [
            'title' => 'Notifikasi Detail',
            'uri' => $this->uri,
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'result' => $query
        ];

        return view('notif/detail', $data);
    }

}
