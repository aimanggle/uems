<?php

namespace App\Controllers;

use Config\Database;
use Config\Services;
use App\Models\EventModel;
use App\Controllers\BaseController;

class Event extends BaseController
{
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->validation = Services::validation();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_event') ? $this->request->getVar('page_event') : 1;

        $event = $this->eventModel->findAll();
        $data=[
            'title' => 'Event | UEMS',
            'event' => $this->eventModel->orderBy('eventid', 'DESC')->paginate(15, 'event'),
            'pager' => $this->eventModel->pager,
            'currentpage' => $currentPage,
            
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
            'title' => 'New Event | UEMS',
            'validation' => $this->validation,
        ];

        return view('event/create', $data);
    }

    public function insert()
    {
        //validate input
        if(!$this->validate([
            'eventname' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Event name is required',
                ]
            ],
            'eventdesc' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Event description is required',
                ]
            ],
        ])){
            $validation = $this->validation;
            return redirect()->back()->withInput()->with('validation', $validation);
        }

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

        $db = \Config\Database::connect();
        $builder = $db->table('registrant');
        $builder->where('eventid', $eventid);
        $builder->delete();
    

        return redirect()->to('/event')->with('error', 'Event has been delete!');
    }
}
