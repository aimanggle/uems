<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\RegistrantModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->registrantModel = new RegistrantModel();
    }
    
    public function dashboard()
    {
        $data=[
            'title' => 'Dashboard | UEMS',
            'event' => $this->eventModel->countevent(),
            'ongoing' => $this->eventModel->countOnGoing(),
            'complete' => $this->eventModel->countComplete(),
            'eventforthismonth' => $this->eventModel->showeventforthismonth(),
            'regtoday' => $this->registrantModel->countregtoday(),

        ];
        // d($data);
        return view('dashboard/dashboard', $data);
    }

}
