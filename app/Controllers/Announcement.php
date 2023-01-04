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
            'announce' => $this->announcementModel->join('event', 'announcement.eventid = event.eventid')->orderby('announceid', 'DESC')->findAll(),
        ];
        // d($data);
        return view('announcement/show', $data);
    }
}
