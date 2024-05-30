<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employees extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel karyawan
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_karyawan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'usia'      => [
                'type'           => 'INT',
                'constraint'     => 2,
            ],
            'status_vaksin_1'      => [
                'type'           => 'ENUM',
                'constraint'     => ['sudah', 'belum'],
                'default'        => 'belum',
            ],
            'status_vaksin_2'      => [
                'type'           => 'ENUM',
                'constraint'     => ['sudah', 'belum'],
                'default'        => 'belum',
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel karyawan
        $this->forge->createTable('employees', TRUE);
    }

    //-------------------------------------------------------

    public function down()
    {
        // menghapus tabel karyawan
        $this->forge->dropTable('employees');
    }
}
