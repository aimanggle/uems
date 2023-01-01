<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\CollegeModel;
use App\Models\StudentModel;
use App\Models\SemesterModel;
use App\Models\RegistrantModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for all data show in dashboard
    |
     */

    /**
     * ---------------------------------------------
     * Constructor to load model
     * ---------------------------------------------
     */
    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->registrantModel = new RegistrantModel();
        $this->collegeModel = new CollegeModel();
        $this->studentModel = new StudentModel();
        $this->semesterModel = new SemesterModel();
    }
    
    /**
     *  ----------------------------------------
     *  Methods to view dashboard page
     *  @param null
     *  ----------------------------------------
     */
    public function dashboard()
    {

        $collegeidcoe = '1';
        $collegeidcoba = '2';
        $collegeidcci = '3';
        $collegeidces = '4';
        $collegidcogs = '5';

        $coe = $this->registrantModel->countregbycollege($collegeidcoe);
        $coba = $this->registrantModel->countregbycollege($collegeidcoba);
        $cci = $this->registrantModel->countregbycollege($collegeidcci);
        $ces = $this->registrantModel->countregbycollege($collegeidces);
        $cogs = $this->registrantModel->countregbycollege($collegidcogs);

        $ttlregis = $this->registrantModel->countregbysid();
        $ttlregdef = $this->registrantModel->countAll();

        $semdate = $this->semesterModel->first();

        $sem1startdate = $semdate['s1startdate'];
        $sem1enddate = $semdate['s1enddate'];

        $shortstartdate = $semdate['shortstartdate'];
        $shortenddate = $semdate['shortenddate'];

        $sem2startdate = $semdate['s2startdate'];
        $sem2enddate = $semdate['s2enddate'];

        $sem1 = $this->registrantModel->countregbetween($sem1startdate, $sem1enddate);
        $short = $this->registrantModel->countregbetween($shortstartdate, $shortenddate);
        $sem2 = $this->registrantModel->countregbetween($sem2startdate, $sem2enddate);

        $data=[
            'url' => 'dashboard',
            'title' => 'Dashboard | UEMS',
            'event' => $this->eventModel->countevent(),
            'ongoing' => $this->eventModel->countOnGoing(),
            'complete' => $this->eventModel->countComplete(),
            'eventforthismonth' => $this->eventModel->showeventforthismonth(),
            'regtoday' => $this->registrantModel->countregtoday(),
            'username' => session()->get('user_name'),
            'college' => $this->collegeModel->FindAll(),
            'student' => $this->studentModel->countstudent(),
            'coe' => $coe,
            'coba' => $coba,
            'cci' => $cci,  
            'ces' => $ces,
            'cogs' => $cogs,    
            'ttlregis' => $ttlregis,  
            'ttlregdef' => $ttlregdef,
            'sem1' => $sem1,
            'short' => $short,
            'sem2' => $sem2,
        ];
        return view('dashboard/dashboard', $data);
    }

}
