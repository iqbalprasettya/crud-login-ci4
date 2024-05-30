<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $data['title'] = 'Login';

        // View
        echo view('header', $data);
        echo view('login', $data);
        echo view('footer', $data);
    }

    // auth
    public function auth()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();
        if (is_null($user)) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password');
        }
        $pwd_verify = password_verify($password, $user['password']);
        if (!$pwd_verify) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password');
        }

        $ses_data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'isLoggedIn' => TRUE
        ];

        $session->set($ses_data);
        return redirect()->to(base_url('employee'));
    }

    // logout
    public function logout()
    {
        session_destroy();
        return redirect()->to(base_url('login'));
    }
}
