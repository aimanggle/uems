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
        return view('trackprogram/show', $data);
    
    }

    public function show()
    {
        $studentid = $this->request->getVar('studentid');
        $student = $this->studentModel->detail($studentid);
        if ($student) 
        {
            $data = [
                'title' => 'Track | UEMS',
                'student' => $student,
                'registrant' => $this->registrantModel->trackevent($student->sid),
            ];
            // dd($data);
            return view('trackprogram/detail', $data);
        } 
        else 
        {
            session()->setFlashdata('message', 'Student ID not found');
            return redirect()->to('/event/track');
        }
    }
    
}
