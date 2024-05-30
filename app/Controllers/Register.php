<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }
    public function index()
    {
        $data['title'] = 'Register';

        // View
        echo view('header', $data);
        echo view('register', $data);
        echo view('footer', $data);
    }

    public function register()
    {
        $rules = [
            'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
            'confirm_password'  => ['label' => 'confirm password', 'rules' => 'matches[password]']
        ];


        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to(base_url('login'));
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Register';

            // View
            echo view('header', $data);
            echo view('register', $data);
            echo view('footer', $data);
        }
    }
}
