<?php

namespace App\Controllers;

use Config\Database;
use Config\Services;
use App\Models\EventModel;
use App\Models\RegistrantModel;
use App\Models\EventCategoryModel;
use App\Controllers\BaseController;

class Event extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Event Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible to handle all user requests related to events.
    |
     */

    /**
     * ---------------------------------------------
     *  Constructor to load model
     * ---------------------------------------------
     */
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->eventCategoryModel = new EventCategoryModel();
        $this->registrantModel = new RegistrantModel();
        $this->validation = Services::validation();
    }

    /**
     * --------------------------------------------------------------------
     *  Method to show event page with pagination
     *  @param null
     * --------------------------------------------------------------------
     */
    public function index()
    {
        $currentPage = $this->request->getVar('page_event') ? $this->request->getVar('page_event') : 1;

        $keyword = $this->request->getVar('attendance');

        if ($keyword) 
        {
            $event = $this->eventModel->search($keyword)->orderBy('eventid', 'DESC');
        } 
        else 
        {
            $event = $this->eventModel->orderBy('eventid', 'DESC');
        }

        $data=[
            'url' => 'event',
            'title' => 'Event | UEMS',
            'event' => $event->paginate(15, 'event'),
            'pager' => $this->eventModel->pager,
            'currentpage' => $currentPage,
            'keyword' => $keyword,
            
        ];
        return view('event/event', $data);
    }

    /**
     * --------------------------------------------------------------------
     *  Method to show event detail page
     *  @param int $eventid
     * --------------------------------------------------------------------
     */
    public function detail($eventid)
    {
        $data=[
            'url' => 'event',
            'title' => 'Event Detail | UEMS',
            'event' => $this->eventModel->Find($eventid),
            'eventcategory' => $this->eventCategoryModel->findAll(),
        ];
        return view('event/detail', $data);
    }

    /**
     * --------------------------------------------------------------------
     *  Method to show create new event page
     *  @param null
     * --------------------------------------------------------------------
     */
    public function create()
    {
        $data=[
            'url' => 'event',
            'title' => 'New Event | UEMS',
            'validation' => $this->validation,
            'eventcategory' => $this->eventCategoryModel->findAll(),
        ];

        return view('event/create', $data);
    }

    /**
     * --------------------------------------------------------------------
     *  Method to insert new event
     *  @param null
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
            'eventdate' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Event date is required',
                ]
            ],
            'eventtype' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Event type is required',
                ]
            ],
            'eventtime' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Event time is required',
                ]
            ],
            'eventstat' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Event status is required',
                ]
            ],
            'eventscorun' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Event scorun is required',
                ]
            ],
            'eventcategory' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Event category is required',
                ]
            ],
            'register' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Event register is required',
                ]
            ],
        ]))
        {
            $validation = $this->validation;
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        if($this->request->getFile('image') == '')
        {

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
                'updated_at' => null,
                'deleted_at' => null,
            ];
            $this->eventModel->insert($data);
        }
        else
        {
            $file = $this->request->getFile('image');
            $file->move('asset/event/');
            $filename = $file->getName();
    
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
                'eventimage' => $filename,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'deleted_at' => null,
            ];
            // dd($data);
            $this->eventModel->insert($data);

        }
        return redirect()->to('/event')->with('success', 'Success Add New Event');
    }
    
    /**
     * --------------------------------------------------------------------
     *  Method to show edit event page
     *  @param int $eventid
     * --------------------------------------------------------------------
     */
    public function edit($eventid)
    {
        $data=[
            'url' => 'event',
            'title' => 'Edit Event | UEMS',
            'event' => $this->eventModel->find($eventid),
            'eventcategory' => $this->eventCategoryModel->findAll(),
        ];

        return view('event/edit', $data);
    }

    /**
     * --------------------------------------------------------------------
     *  Method to update event data
     *  @param int $eventid
     * --------------------------------------------------------------------
     */
    public function update($eventid)
    {
        if($this->request->getFile('image') == null)
        {
            if($this->request->getVar('eventstat') == 'cancel')
            {
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
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $this->eventModel->update($eventid, $data);

                //create new announcement

                return redirect()->back()->with('message', 'Event Detail Updated');
            }
            else
            {
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
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $this->eventModel->update($eventid, $data);
            }
        }
        else
        {
            $file = $this->request->getFile('image');
            $file->move('asset/event/');
            $filename = $file->getName();
    
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
                'eventimage' => $filename,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ];
            $this->eventModel->update($eventid, $data);
        }
        return redirect()->back()->with('message', 'Event Detail Has been update');
    }

    /**
     * --------------------------------------------------------------------
     *  Method to show delete event
     *  @param null
     * --------------------------------------------------------------------
     */
    public function retrieve()
    {
        $data=[
            'url' => 'event',
            'title' => 'Deleted Event | UEMS',
            'event' => $this->eventModel->onlyDeleted()->findAll(),
        ];
        return view('event/retrieve', $data);
    }

    /**
     * --------------------------------------------------------------------
     *  Method to restore event data
     *  @param int $eventid
     * --------------------------------------------------------------------
     */
    public function restore($eventid)
    {
        $data=[
            'deleted_at' => null,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->eventModel->update($eventid, $data);

        $db = \Config\Database::connect();
        $builder = $db->table('registrant');
        $builder->where('eventid', $eventid);
        $builder->update($data);

        return redirect()->to('/event')->with('success', 'Event Has been restore');
    }

    /**
     * --------------------------------------------------------------------
     *  Method to delete event data
     *  @param int $eventid
     * --------------------------------------------------------------------
     */
    public function delete($eventid)
    {
        
        $this->eventModel->where('eventid', $eventid,)->delete();

        $this->registrantModel->where('eventid', $eventid,)->delete();
    
        return redirect()->to('/event')->with('error', 'Event has been delete!');
    }
}
