<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Controllers\BaseController;

class Registrant extends BaseController
{
    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Registrant | UEMS',
            'event' => $this->eventModel->FindAll(),
           
        ];
        return view('registrant/show', $data);
    }
}
