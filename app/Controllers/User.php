<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'User',
            // 'user' => $this->userModel->getUser(),
        ];
        return view('user/show', $data);
    }
}
