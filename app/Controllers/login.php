<?php

namespace App\Controllers;

use App\Models\usermodel;

class login extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new usermodel();
    }
    public function loginn(): string
    {
        return view('login');
    }
    public function loginproses()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));

        $userr = $this->user->where('username', $username)
            ->where('password', $password)
            ->first();

        if ($userr) {
            $session->set([
                'username' => $userr['username'],
                'role' => $userr['role'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/')->with('error', 'Username atau Password salah');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
