<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Controllers\BaseController;

class Listing extends BaseController
{
    public function __construct()
    {
        $this->eventModel = new EventModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Listing | UEMS',
            'event' => $this->eventModel->findAll()
        ];
        // d($data);
    
        return view('listing/listing', $data);
    }

    public function detail($eventid)
    {
        $data = [
            'title' => 'Detail | UEMS',
            'event' => $this->eventModel->find($eventid)
        ];
        // d($data);
    
        return view('listing/detail', $data);
    }
}
