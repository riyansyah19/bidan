<?php

namespace App\Controllers;

use App\Models\usermodel;

class manajemen extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new usermodel();
    }
    public function manaj(): string
    {
        $data = [
            'userss' => $this->user->findAll()
        ];
        return view('manajemen_akses', $data);
    }
    public function tambah(): string
    {
        return view('tambahuser');
    }
    public function save()
    {
        $this->user->insert([
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'confirm_password' => $this->request->getVar('c_password'),
            'role' => $this->request->getVar('role'),
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan');
        return redirect()->to('/manaj');
    }
    public function tedit($id)
    {
        $data = [
            'user' => $this->user->where(['id_user' => $id])->first(),
        ];

        return view('edit/tambahuser', $data);
    }

    public function update($id)
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'confirm_password' => $this->request->getVar('c_password'),
            'role' => $this->request->getVar('role'),
        ];

        // Gunakan $id sebagai parameter pertama
        $this->user->update($id, $data);

        session()->setFlashdata('pesan', 'data berhasil diedit');
        return redirect()->to('/manaj');
    }

    public function delete($id)
    {
        $this->user->delete($id);
        return redirect()->to('/manaj');
    }
}
