<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['password', 'role', 'nama_user'];

    public function getUser($password)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE password='$password' LIMIT 1;")->getRowArray();
    }

    public function getAllUser()
    {
        return $this->db->query("SELECT * FROM $this->table")->getResultArray();
    }

    public function insertUser($data)
    {
        $password = $data['password'];
        $nama = $data['nama_user'];
        $role = $data['role'];

        return $this->db->query("INSERT INTO $this->table(password, nama_user, role) VALUES('$password', '$nama', '$role');");
    }

    public function deleteUser($id)
    {
        return $this->db->query("DELETE FROM $this->table WHERE id='$id';");
    }
}
