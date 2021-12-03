<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $this->builder = $this->db->table('users');
        $this->builder->select('*');
        $this->builder->where('active', 1);
        $user_active = $this->builder->countAllResults();

        $this->builder = $this->db->table('users');
        $this->builder->select('*');
        $user = $this->builder->countAllResults();

        $this->builder = $this->db->table('users');
        $this->builder->select('*');
        $this->builder->where('active', 0);
        $user_nonactive = $this->builder->countAllResults();

        $this->builder = $this->db->table('auth_logins');
        $this->builder->select('*');
        $login = $this->builder->countAllResults();

        $this->builder = $this->db->table('auth_logins');
        $this->builder->select('*');
        $this->builder->orderby('date', 'DESC');
        $users = $this->builder->get()->getResult();

        $data = [
            'title' => 'Admin',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'user_active' => $user_active,
            'user_nonactive' => $user_nonactive,
            'login' => $login,
            'user' => $user,
            'users' => $users,
        ];
        return view('admin/index', $data);
    }
    public function userlist()
    {
        $this->builder = $this->db->table('users');
        $this->builder->select('*');
        $this->builder->orderby('id','DESC');
        $users = $this->builder->get()->getResult();

        $data = [
            'title' => 'Admin | User List',
            'notifAll' => $this->notifAll,
            'notif' => $this->notif,
            'uri' => $this->uri,
            'users' => $users,
        ];
        return view('admin/userlist', $data);
    }
}
