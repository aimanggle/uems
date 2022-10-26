<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\RegistrantModel;
use App\Controllers\BaseController;

class Registrant extends BaseController
{
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->registrantModel = new RegistrantModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Registrant | UEMS',
            'event' => $this->eventModel->FindAll(),
           
        ];
        return view('registrant/show', $data);
    }

    public function detail($eventid)
    {
        $data = [
            'title' => 'Registrant | UEMS',
            'regis' => $this->registrantModel->findbyeventid($eventid)
        ];
        dd($data);
        return view('registrant/detail', $data);
    
    }
}
