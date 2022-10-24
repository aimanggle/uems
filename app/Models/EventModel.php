<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
   
    protected $table            = 'event';
    protected $primaryKey       = 'eventid';
    protected $allowedFields    = ['eventid', 'eventname', 'eventdesc', 'eventdate',  'eventtype', 'eventtime', 'eventstatus', 'eventscorun', 'register'];

    public function countevent()
    {
        return $this->countAll();
    }
   
   
}
