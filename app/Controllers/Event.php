<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Event extends BaseController
{
    public function index()
    {
        $data=[
            'title' => 'Event | UEMS'
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

    public function showinsertevent()
    {
        $data=[
            'title' => 'New Event | UEMS'
        ];

        return view('event/insertevent', $data);
    }

    public function insert()
    {
        $eventmodels = new \App\Models\EventModels();

        $data=[
            'eventname' => $this->request->getVar('eventname'),
            'eventdate' => $this->request->getVar('eventdate'),
            'eventtime' => $this->request->getVar('eventtime'),
            'eventtype' => $this->request->getVar('eventtype'),
            'eventcategory' => $this->request->getVar('eventcategory'),
            'eventstatus' => $this->request->getVar('eventstatus'),
            'eventscorun' => $this->request->getVar('eventscorun'),
        ];

        $eventmodels->insert($data)->with('message', 'Success');
        return redirect()->to('/event');
    }
    
    public function editform()
    {
        $eventmodels = new \App\Models\EventModels();

        $data=[
            'title' => 'Edit Event | UEMS',
            'event' => $eventmodels->find($this->request->getVar('id'))
        ];

        return view('event/editevent', $data);
    }
}
