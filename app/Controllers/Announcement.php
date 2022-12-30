<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;
use App\Controllers\BaseController;

class Announcement extends BaseController
{
    
    public function __construct()
    {
        //load model
        $this->announcementModel = new AnnouncementModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Announcement | UEMS',
            'announce' => $this->announcementModel->findAll(),
        ];
        return view('announcement/show', $data);
    }
}
