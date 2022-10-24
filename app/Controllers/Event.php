<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Controllers\BaseController;

class Event extends BaseController
{
    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        
        $data=[
            'title' => 'Event | UEMS',
            'event' => $this->eventModel->FindAll(),
            
        ];
        return view('event/event', $data);
    }

    public function detail()
    {
        $data=[
            'title' => 'Event Detail | UEMS'
        ];
        return view('event/detail', $data);
    }

    public function create()
    {
        $data=[
            'title' => 'New Event | UEMS'
        ];

        return view('event/create', $data);
    }

    public function insert()
    {
       
        $data=[
            'eventname' => $this->request->getVar('eventname'),
            'eventdesc' => $this->request->getVar('eventdesc'),
            'eventdate' => $this->request->getVar('eventdate'),
            'eventtype' => $this->request->getVar('eventtype'),
            'eventtime' => $this->request->getVar('eventtime'),
            // 'eventcategory' => $this->request->getVar('eventcategory'),
            'eventstatus' => $this->request->getVar('eventstat'),
            'eventscorun' => $this->request->getVar('eventscorun'),
            'register' => $this->request->getVar('register'),
        ];
        // dd($data);
        $this->eventModel->insert($data);
        return redirect()->to('/event')->with('message', 'Success');
    }
    
    public function editform()
    {
        

        $data=[
            'title' => 'Edit Event | UEMS',
            'event' => $this->eventModel->find($this->request->getVar('id'))
        ];

        return view('event/editevent', $data);
    }
}
