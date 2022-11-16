<?php

namespace App\Controllers;

use Config\Database;
use Config\Services;
use App\Models\EventModel;
use App\Models\EventCategoryModel;
use App\Controllers\BaseController;

class Event extends BaseController
{
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->eventCategoryModel = new EventCategoryModel();
        $this->validation = Services::validation();
    }

    /**
     * --------------------------------------------------------------------
     * Show Event Page Function
     * @param null
     * --------------------------------------------------------------------
     */
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

    /**
     * --------------------------------------------------------------------
     * Show Event Detail Page Function
     * @param int $eventid
     * --------------------------------------------------------------------
     */
    public function detail($eventid)
    {
        $data=[
            'title' => 'Event Detail | UEMS',
            'event' => $this->eventModel->Find($eventid),
            'eventcategory' => $this->eventCategoryModel->findAll(),
        ];
        return view('event/detail', $data);
    }

    /**
     * --------------------------------------------------------------------
     * Show Event Create Page Function
     * @param null
     * --------------------------------------------------------------------
     */
    public function create()
    {
        $data=[
            'title' => 'New Event | UEMS',
            'validation' => $this->validation,
            'eventcategory' => $this->eventCategoryModel->findAll(),
        ];

        return view('event/create', $data);
    }

    /**
     * --------------------------------------------------------------------
     * Attempt Event Create Function
     * @param null
     * --------------------------------------------------------------------
     */
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
            'eventcatname' => $this->request->getVar('eventcategory'),
            'eventstatus' => $this->request->getVar('eventstat'),
            'eventscorun' => $this->request->getVar('eventscorun'),
            'register' => $this->request->getVar('register'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        // dd($data);
        $this->eventModel->insert($data);
        return redirect()->to('/event')->with('success', 'Success Add New Event');
    }
    
    /**
     * --------------------------------------------------------------------
     * Show Event Edit Page Function
     * @param int $eventid
     * --------------------------------------------------------------------
     */
    public function edit($eventid)
    {
        $data=[
            'title' => 'Edit Event | UEMS',
            'event' => $this->eventModel->find($eventid),
            'eventcategory' => $this->eventCategoryModel->findAll(),
        ];

        return view('event/edit', $data);
    }

     /**
     * --------------------------------------------------------------------
     * Update data into Db
     * @param int $eventid
     * --------------------------------------------------------------------
     */
    public function update($eventid)
    {
        $data=[
            // 'eventid' => $eventid,
            'eventname' => $this->request->getVar('eventname'),
            'eventdesc' => $this->request->getVar('eventdesc'),
            'eventdate' => $this->request->getVar('eventdate'),
            'eventtype' => $this->request->getVar('eventtype'),
            'eventtime' => $this->request->getVar('eventtime'),
            'eventcatname' => $this->request->getVar('eventcategory'),
            'eventstatus' => $this->request->getVar('eventstat'),
            'eventscorun' => $this->request->getVar('eventscorun'),
            'register' => $this->request->getVar('register'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        // dd($data);
        $this->eventModel->update($eventid, $data);
        return redirect()->back()->with('message', 'Event Detail Has been update');
    }

    /**
     * --------------------------------------------------------------------
     * Show retrieve event page
     * @param null
     * --------------------------------------------------------------------
     */
    public function retrieve()
    {
        $data=[
            'title' => 'Deleted Event | UEMS',
            'event' => $this->eventModel->onlyDeleted()->findAll(),
        ];

        return view('event/retrieve', $data);
        d($data);

    }

    /**
     * --------------------------------------------------------------------
     * restore event 
     * @param int $eventid
     * --------------------------------------------------------------------
     */
    public function restore($eventid)
    {
        $data=[
            'deleted_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->eventModel->update($eventid, $data);
        return redirect()->to('/event')->with('success', 'Event Has been restore');
    }

    /**
     * --------------------------------------------------------------------
     * Delete data from table
     * @param int $eventid
     * --------------------------------------------------------------------
     */
    public function delete($eventid)
    {
        
        $db = \Config\Database::connect();
        $builder = $db->table('registrant');
        $builder->where('eventid', $eventid);
        $builder->delete();

        $data=[
            'deleted_at' => date('Y-m-d H:i:s'),
            // 'eventid' => $eventid,
        ];
        // dd($data);
        $this->eventModel->update($eventid, $data);
    

        return redirect()->to('/event')->with('error', 'Event has been delete!');
    }
}
