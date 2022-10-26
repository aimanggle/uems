<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\RegistrantModel;
use App\Controllers\BaseController;

class Track extends BaseController
{
    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->registrantModel = new RegistrantModel();
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

        $studetail = $this->studentModel->detail($studenid);

        $sid = $studetail->sid;


        $track = $this->registrantModel->trackevent($sid);
        // d($studentid);
        $data = [
            'title' => 'Track | UEMS',
            // 'student' => $this->studentModel->find($studenid),
            'track' => $track
        ];
        d($data);
    
        return view('trackprogram/detail', $data);
    }
}
