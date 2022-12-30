<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    
    protected $table            = 'announcement';
    protected $primaryKey       = 'announceid';
    protected $allowedFields    = ['announcetitle', 'announcedesc', 'eventid','announcedate'];

    
}
