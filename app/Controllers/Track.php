<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Track extends BaseController
{
    public function __construct()
    {
        // $this->studentModel = new \App\Models\StudentModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Track | UEMS',
        ];
        // d($data);
    
        return view('trackprogram/show', $data);
    }

    //detail
    public function detail()
    {
        $studentid = $this->request->getVar('studentid');
        d($studentid);
        $data = [
            'title' => 'Track | UEMS',
            // 'student' => $this->studentModel->find($studenid),
        ];
        // d($data);
    
        return view('trackprogram/detail', $data);
    }
}
