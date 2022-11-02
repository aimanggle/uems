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

        $mondaydate = date('Y-m-d', strtotime('monday this week'));
        $tuesdaydate = date('Y-m-d', strtotime('tuesday this week'));
        $wednesdaydate = date('Y-m-d', strtotime('wednesday this week'));
        $thursdaydate = date('Y-m-d', strtotime('thursday this week'));
        $fridaydate = date('Y-m-d', strtotime('friday this week'));
        $saturdaydate = date('Y-m-d', strtotime('saturday this week'));
        $sundaydate = date('Y-m-d', strtotime('sunday this week'));
        
        $data=[
            'title' => 'Dashboard | UEMS',
            'event' => $this->eventModel->countevent(),
            'ongoing' => $this->eventModel->countOnGoing(),
            'complete' => $this->eventModel->countComplete(),
            'eventforthismonth' => $this->eventModel->showeventforthismonth(),
            'regtoday' => $this->registrantModel->countregtoday(),
            'regfirstdate' => $this->registrantModel->countregfirstdate($mondaydate),
            'regseconddate' => $this->registrantModel->countregseconddate($tuesdaydate),
            'regthirddate' => $this->registrantModel->countregthirddate($wednesdaydate),
            'regfourthdate' => $this->registrantModel->countregfourthdate($thursdaydate),
            'regfifthdate' => $this->registrantModel->countregfifthdate($fridaydate),
            'regsixthdate' => $this->registrantModel->countregsixthdate($saturdaydate),
            'regseventhdate' => $this->registrantModel->countregseventhdate($sundaydate),
            'username' => session()->get('user_name'),

        ];
        // dd($data);

        return view('dashboard/dashboard', $data);
    }

}
