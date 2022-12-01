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
            'url' => 'registrant',
            'title' => 'Registrant | UEMS',
            'event' => $this->eventModel->orderBy('eventid', 'DESC')->FindAll(),
        ];
        return view('registrant/show', $data);
    }

    public function detail($eventid)
    {
        $data = [
            'url' => 'registrant',
            'title' => 'Registrant | UEMS',
            'event' => $this->eventModel->Find($eventid),
            'regis' => $this->registrantModel->findbyeventid($eventid),
            'ttlreg' => $this->registrantModel->countregbyevent($eventid),
            'ttlregtoday' => $this->registrantModel->countregbyeventtoday($eventid),
        ];
        // dd($data);
        return view('registrant/detail', $data);
    
    }
}
