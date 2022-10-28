<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class User extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->userModel->findAll(),
        ];
        // dd($data);
        return view('user/show', $data);
    }

    public function insert()
    {
        $data =[
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role'),
            'userstat' => $this->request->getVar('userstat'),
        ];

        $this->userModel->insert($data);
        return redirect()->back()->with('success', 'User has been added successfully');
    }
}
