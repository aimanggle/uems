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
    public function index($key = null)
    {
        $event = $this->EventModel->findAll();
        
        if($event)
        {
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Event data has been retrieved successfully'
                ],
                'data' => $event
            ];
            return $this->respond($response, 200);
    
        }
    }   

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($eventid = null)
    {
       
        $event = $this->EventModel->find($eventid);
        if($event)
        {
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Event data has been retrieved successfully'
                ],
                'data' => $event
            ];
            return $this->respond($response, 200);
        }
        else
        {
            $response = [
                'status' => 404,
                'error' => null,
                'messages' => [
                    'fail' => 'Event id not found'
                ],
                'data' => null
            ];
            return $this->respond($response, 404);
        }
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
