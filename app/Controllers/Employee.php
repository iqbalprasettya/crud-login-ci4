<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Employee_model;

class Employee extends Controller
{
    // fungsi yang dibuat untuk tampilan awal aplikasi ketika dibuka
    public function index()
    {
        $model = new Employee_model();
        $data['title'] = 'Data Vaksin Karyawan';
        $data['getKaryawan'] = $model->getKaryawan();

        // View
        echo view('header', $data);
        echo view('employee_view', $data);
        echo view('footer', $data);
    }

    // fungsi untuk mengambil data yang diinputkan melalui form view tambah data
    public function add()
    {
        $model = new Employee_model();

        $data = array(
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'usia'         => $this->request->getPost('usia'),
            'status_vaksin_1'  => $this->request->getPost('status_vaksin_1'),
            'status_vaksin_2'  => $this->request->getPost('status_vaksin_2')

        );
        // dd($data);
        $model->saveKaryawan($data);
        echo '<script>
                alert("Selamat! Berhasil Menambah Data Vaksinasi Karyawan");
                window.location="' . base_url('employee') . '"
            </script>';
    }

    // akan menampilkan form edit dari data yang dipilih.
    public function edit($id)
    {
        $model = new Employee_model();

        $getKaryawan = $model->getKaryawan($id)->getRow();

        if (isset($getKaryawan)) {
            $data['employee'] = $getKaryawan;
            $data['title'] = 'Edit Data Vaksin Karyawan';

            // View
            echo view('header', $data);
            echo view('edit_view', $data);
            echo view('footer', $data); 
        } else {
            echo '<script>
            alert("ID karyawan ' . $id . ' Tidak ditemukan");
            window.location="' . base_url('employee') . '"
        </script>';
        }
    }

    // update() akan dipanggil untuk mengupdate data di database ketika Anda mengklik tombol Update.
    public function update()

    {
        // dd("testt");
        $model = new Employee_model();

        $id = $this->request->getPost('id');
        $data = array(
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'usia'         => $this->request->getPost('usia'),
            'status_vaksin_1'  => $this->request->getPost('status_vaksin_1'),
            'status_vaksin_2'  => $this->request->getPost('status_vaksin_2')
        );
        $model->editKaryawan($data, $id);

        echo '<script>alert("Selamat! Anda berhasil melakukan update data."); window.location="' . base_url('employee') . '"</script>';
    }

    // hapus() untuk menghapus data di database ketika mengklik tombol hapus
    public function hapus($id)
    {
        $model = new Employee_model;
        $getKaryawan = $model->getKaryawan($id)->getRow();

        if (isset($getKaryawan)) {
            $model->deleteKaryawan($id);
            echo '<script>
                    alert("Selamat! Data berhasil terhapus.");
                    window.location="' . base_url('employee') . '"
                </script>';
        } else {
            echo '<script>
                    alert("Gagal Menghapus !, ID karyawan ' . $id . ' Tidak ditemukan");
                    window.location="' . base_url('employee') . '"
                </script>';
        }
    }
}
