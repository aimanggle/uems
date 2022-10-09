<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function dashboard()
    {
        $data=[
            'title' => 'UEMS | Dashboard'
        ];
        return view('dashboard/dashboard', $data);
    }

}
