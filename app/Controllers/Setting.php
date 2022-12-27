<?php

namespace App\Controllers;

use App\Models\CollegeModel;
use App\Models\SemesterModel;
use App\Controllers\BaseController;

class Setting extends BaseController
{
    /**
     * --------------------------------------------------------------------
     * Constructor
     * --------------------------------------------------------------------
     */
    public function __construct()
    {
        $this->semesterModel = new SemesterModel();
        $this->collegeModel = new CollegeModel();
    }

    /**
     * --------------------------------------------------------------------
     * Method for show setting page
     * @param null
     * --------------------------------------------------------------------
     */
    public function index()
    {
        $data = [
            'url' => 'setting',
            'title' => 'Setting |  UEMS',
            'semester' => $this->semesterModel->first(),
            'collge' => $this->collegeModel->findAll()
        ];
        return view('setting/show', $data);
    }

    /**
     * --------------------------------------------------------------------
     * Method for update semester date
     * @param null
     * --------------------------------------------------------------------
     */
    public function updatesemesterdate()
    {
        $data = [
            's1startdate' => $this->request->getVar('s1startdate'),
            's1enddate' => $this->request->getVar('s1enddate'),
            'shortstartdate' => $this->request->getVar('shortstartdate'),
            'shortenddate' => $this->request->getVar('shortenddate'),
            's2startdate' => $this->request->getVar('s2startdate'),
            's2enddate' => $this->request->getVar('s2enddate'),
        ];
        $this->semesterModel->update(1, $data);
        session()->setFlashdata('success', 'Setting has been update');
        return redirect()->to('/setting');
    }
}
