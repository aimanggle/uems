<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class User extends BaseController
{
    /**
     *  ----------------------------------------
     *  Public Methods
     *  ----------------------------------------
     */
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     *  ----------------------------------------
     *  Methods to view all users
     *  ----------------------------------------
     */
    public function index()
    {
        $data = [
            'url' => 'user',
            'title' => 'User',
            'user' => $this->userModel->findAll(),
        ];
        return view('user/show', $data);
    }

    /**
     *  ----------------------------------------
     *  Function to insert new user
     *  ----------------------------------------
     */
    public function insert()
    {
        
        $data =[
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role'),
            'userstat' => $this->request->getVar('userstat'),
            'created_date' => date('Y-m-d')
        ];

        $this->userModel->insert($data);
        return redirect()->back()->with('success', 'User has been added successfully');
    }

    /**
     *  ----------------------------------------
     *  Function to update user detail
     *  @param int $id
     *  ----------------------------------------
     */
    public function updatedetail($id)
    {
        $data =[
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role'),
            'userstat' => 'active',
        ];

        $this->userModel->update($id, $data);
        return redirect()->back()->with('success', 'User has been updated successfully');
    }

    /**
     *  ----------------------------------------
     *  Function to update user status
     *  @param int $id
     *  ----------------------------------------
     */
    public function updatestat($id)
    {
        $data =[
            'userstat' => $this->request->getVar('userstat'),
        ];

        $this->userModel->update($id, $data);
        return redirect()->back()->with('success', 'User Status has been updated successfully');
    }
}
