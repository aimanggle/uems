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
        $currentdate = date('Y-m-d');
        $seconddate = date("Y-m-d", strtotime("-1 days"));
        $thirddate = date("Y-m-d", strtotime("-2 days"));
        $fourthdate = date("Y-m-d", strtotime("-3 days"));
        $fifthdate = date("Y-m-d", strtotime("-4 days"));
        $sixthdate = date("Y-m-d", strtotime("-5 days"));
        $seventhdate = date("Y-m-d", strtotime("-6 days"));



        $data=[
            'title' => 'Dashboard | UEMS',
            'event' => $this->eventModel->countevent(),
            'ongoing' => $this->eventModel->countOnGoing(),
            'complete' => $this->eventModel->countComplete(),
            'eventforthismonth' => $this->eventModel->showeventforthismonth(),
            'regtoday' => $this->registrantModel->countregtoday(),
            'regfirstdate' => $this->registrantModel->countregfirstdate($currentdate),
            'regseconddate' => $this->registrantModel->countregseconddate($seconddate),
            'regthirddate' => $this->registrantModel->countregthirddate($thirddate),
            'regfourthdate' => $this->registrantModel->countregthirddate($fourthdate),
            'regfifthdate' => $this->registrantModel->countregthirddate($fifthdate),
            'regsixthdate' => $this->registrantModel->countregthirddate($sixthdate),
            'regseventhdate' => $this->registrantModel->countregthirddate($seventhdate),
            'date' => date('d-M'),
            'date2' => date("d-M", strtotime("-1 days")),
            'date3' => date("d-M", strtotime("-2 days")),
            'date4' => date("d-M", strtotime("-3 days")),
            'date5' => date("d-M", strtotime("-4 days")),
            'date6' => date("d-M", strtotime("-5 days")),
            'date7' => date("d-M", strtotime("-6 days")),

        ];
        // dd($data);
        return view('dashboard/dashboard', $data);
    }

}
