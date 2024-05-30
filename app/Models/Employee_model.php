<?php

namespace App\Models;

use CodeIgniter\Model;

class Employee_model extends Model
{
    protected $table = 'employees';

    // memanggil semua data yang akan ditampilkan di view. 
    public function getKaryawan($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    // fungsi untuk menyimpan data baru ke DATABASE.
    public function saveKaryawan($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    // fungsi untuk menyimpan update data ke DATABASE
    public function editKaryawan($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        return $builder->update($data);
    }

    // fungsi untuk menghapus data ke DATABASE
    public function deleteKaryawan($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id' => $id]);
    }
}
