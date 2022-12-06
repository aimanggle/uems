<?php

namespace App\Controllers;

use App\Models\EventModel;
use CodeIgniter\RESTful\ResourceController;

class Api extends ResourceController
{
    public function __construct()
    {
        $this->EventModel = new EventModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $apikey = $this->request->getVar('apikey');
        $eventid = $this->request->getVar('eventid');
        $eventstatus = $this->request->getVar('eventstatus');
        $sort = $this->request->getVar('sort');

        if($sort == null)
        {
            $sort = 'ASC';
        }

        if($eventid)
        {
            $event = $this->EventModel->find($eventid);
        }
        elseif($eventstatus)
        {
            
            $event = $this->EventModel->where('eventstatus', $eventstatus)->orderby('eventid', $sort)->findAll();
        }
        else
        {
            $event = $this->EventModel->orderby('eventid', $sort)->findAll();
        }

        if($apikey == "123456")
        {
            if($event)
            {
                $response = [
                    'status' => 200,
                    'messages' => [
                        'success' => 'Event data found'
                    ],
                    'data' => $event
                ];
                return $this->respond($response, 200);
            }
            else
            {
                $response = [
                    'status' => 404,
                    'messages' => [
                        'error' => 'Event data not found'
                    ],
                ];
                return $this->respond($response, 404);
            }
        }
        else
        {
            $response = [
                'status' => 401,
                'error' => null,
                'messages' => [
                    'error' => 'Unauthorized'
                ],
                'data' => null
            ];
            return $this->respond($response, 401);
        }
            
        
    }   

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($eventid =  null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
