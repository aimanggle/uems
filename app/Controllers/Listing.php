<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\CollegeModel;
use App\Models\ProgramModel;
use App\Models\StudentModel;
use App\Models\RegistrantModel;
use App\Models\EventCategoryModel;
use App\Controllers\BaseController;

class Listing extends BaseController
{
    /**
     * ---------------------------------------------
     * Public Methods
     * ---------------------------------------------
     */
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->studentModel = new StudentModel();
        $this->EventCategoryModel = new EventCategoryModel();
        $this->RegistrantModel = new RegistrantModel();
        $this->collegeModel = new CollegeModel();
        $this->programModel = new ProgramModel();
    }
    
    /**
     * ---------------------------------------------
     * Public Methods
     * ---------------------------------------------
     */
    public function index()
    {

        $data = [
            'title' => 'Listing | UEMS',
            'event' => $this->eventModel->OrderBy('eventid', 'DESC')->findAll(),
            'eventcat' => $this->EventCategoryModel->findAll()
        ];

        return view('listing/listing', $data);
    }

    public function filter($query)
    {
        
        if($query)
        {
            $event = $this->eventModel->like('eventname', $query)->orLike('eventtype', $query)->orLike('eventstatus', $query)->orLike('eventscorun',$query)->orLike('eventcatname', $query)->findAll();
        }
        else
        {
            $event = $this->eventModel->OrderBy('eventid', 'DESC')->findAll();
        }

        $data = [
            'title' => 'Listing | UEMS',
            'event' => $event,
            'eventcat' => $this->EventCategoryModel->findAll()
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
            // dd($data);
        
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
            $data=[
                'title' => 'Register | UEMS',
                'validation' => \Config\Services::validation(),
                'college' => $this->collegeModel->findAll(),
                'program' => $this->programModel->findAll(),
                'studentid' => $studentid,
                'event' => $this->eventModel->find($eventid)
            ];

            return view('listing/register/student', $data);
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
        // d($data);
        return view('listing/register/step3', $data);
    }

    public function attemptRegister($eventid, $sid, $collegeid)
    {
        $data = [
            'sid' => $sid,
            'eventid' => $eventid,
            'regdate' => date('Y-m-d H:i:s'),
            'collegeid' => $collegeid,
        ];

        if($this->RegistrantModel->save($data))
        {
            $data1=[
                'title' => 'Thank you | UEMS',
                'event' => $this->eventModel->find($eventid),
            ];
            return view('listing/register/thankyou', $data1);
            // return redirect()->to('event/listing/register/thankyou');
        }
    }

    public function thankyou()
    {
        $data1=[
            'title' => 'Thank you | UEMS',
        ];
        return view('listing/register/thankyou', $data1);
    }
    

    public function storestudent($eventid)
    {
        $data = [
            'studentid' => $this->request->getVar('studentid'),
            'fullname' => $this->request->getVar('fullname'),
            'programid' => $this->request->getVar('program'),
            'collegeid' => $this->request->getVar('college'),
        ];
        $this->studentModel->save($data);
        return view('listing/register/thankyou', $data)->with('success', 'You have successfully register to the system');

    }

    public function findcollege($collegeid)
    {
        
        $program = $this->programModel->where('collegeid', $collegeid)->findAll();
        return json_encode($program);
        
    }
}
