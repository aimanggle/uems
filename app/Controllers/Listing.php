<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\StudentModel;
use App\Controllers\BaseController;

class Listing extends BaseController
{
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->studentModel = new StudentModel();
    }
    
    public function index()
    {

        $data = [
            'title' => 'Listing | UEMS',
            'event' => $this->eventModel->orderBy('eventid', 'DESC')->findAll(),
        ];
        // d($data);
    
        return view('listing/listing', $data);
    }

    public function detail($eventid)
    {
        $eventcheck = $this->eventModel->where('eventid', $eventid)->first();

        if($eventcheck['register'] == "Open")
        {
            $data = [
                'title' => 'Detail | UEMS',
                'event' => $this->eventModel->find($eventid)
            ];
            // d($data);
        
            return view('listing/detail', $data);
        }
        else
        {
            $data = [
                'title' => 'Detail | UEMS',
            ];
            return view('listing/close', $data);
        }
    }

    public function register($eventid)
    {
        $data = [
            'title' => 'Register | UEMS',
            'event' => $this->eventModel->find($eventid)
        ];
        // d($data);
    
        return view('listing/register/step1', $data);
    }

    public function register2($eventid)
    {
        $studentid = $this->request->getVar('studentid');

        if(empty($this->studentModel->detail($studentid)))
        {   
            return redirect()->back()->with('error', 'Student ID not found');
        }
        else
        {
            $data = [
                'title' => 'Register | UEMS',
                'event' => $this->eventModel->find($eventid),
                'student' => $this->studentModel->detail($studentid)
                
            ];
            // dd($data);
            return view('listing/register/step2', $data);
        }     
    }

    public function register3($eventid)
    {
        $studentid = $this->request->getVar('studentid');
        $data = [
            'title' => 'Register | UEMS',
            'event' => $this->eventModel->find($eventid),
            'student' => $this->studentModel->detail($studentid)
        ];
        // dd($data);
        return view('listing/register/step3', $data);
    }
}
