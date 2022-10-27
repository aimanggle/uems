<?php

namespace App\Controllers;

use Config\Database;
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
            'event' => $this->eventModel->orderBy('eventid', 'DESC')->FindAll(),
            
        ];
        return view('event/event', $data);
    }

    public function detail($eventid)
    {
        $data=[
            'title' => 'Event Detail | UEMS',
            'event' => $this->eventModel->Find($eventid),
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
        return redirect()->to('/event')->with('success', 'Success Add New Event');
    }
    
    public function edit($eventid)
    {
        $data=[
            'title' => 'Edit Event | UEMS',
            'event' => $this->eventModel->find($eventid)
        ];

        return view('event/edit', $data);
    }

    public function update($eventid)
    {
        $data=[
            'eventid' => $eventid,
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
        $this->eventModel->replace($data);
        return redirect()->back()->with('message', 'Event Detail Has been update');
    }

    public function delete($eventid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('event');
        $builder->where('eventid', $eventid);
        $builder->delete();
    

        return redirect()->to('/event')->with('error', 'Event has been delete!');
    }
}
