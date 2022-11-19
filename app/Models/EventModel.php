<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
   
    protected $table            = 'event';
    protected $primaryKey       = 'eventid';
    protected $useSoftDeletes   = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
    protected $allowedFields    = ['eventid', 'eventname', 'eventdesc', 'eventdate', 'eventcatname', 'eventtype', 'eventtime', 'eventstatus', 'eventscorun', 'register', 'created_at', 'updated_at','deleted_at'];

    public function countevent()
    {
        // $sql = "SELECT COUNT(*) AS `numrows` FROM `event` '";
        return $this->countAll();
    }

    public function countOnGoing()
    {
        // $sql = "SELECT COUNT(*) AS `numrows` FROM `event` WHERE `eventstatus` = 'On Going'";
        return $this->where('eventstatus', 'On Going')->countAllResults();
    }

    public function countComplete()
    {
        // $sql = "SELECT COUNT(*) AS `numrows` FROM `event` WHERE `eventstatus` = 'Completed'";
        return $this->where('eventstatus', 'Completed')->countAllResults();
    }

    public function showeventforthismonth()
    {
        $sql = "SELECT * FROM `event` WHERE MONTH(`eventdate`) = MONTH(CURRENT_DATE()) AND YEAR(`eventdate`) = YEAR(CURRENT_DATE())";
        return $this->db->query($sql)->getResultArray();
    }
    
    public function search($keyword)
    {
        
        return $this->table('customer')->like('eventtype', $keyword);
    }
    
   
   
}
