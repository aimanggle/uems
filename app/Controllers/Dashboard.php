<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->eventModel = new EventModel();
    }
    
    public function dashboard()
    {
        $data=[
            'title' => 'Dashboard | UEMS',
            'event' => $this->eventModel->countevent(),
            'ongoing' => $this->eventModel->countOnGoing(),
            'complete' => $this->eventModel->countComplete(),
            'eventforthismonth' => $this->eventModel->showeventforthismonth(),

        ];
        // d($data);
        return view('dashboard/dashboard', $data);
    }

}
