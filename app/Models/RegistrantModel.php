<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrantModel extends Model
{
    
    protected $table            = 'registrant';
    protected $primaryKey       = 'regid';
    protected $allowedFields    = ['regid', 'sid', 'eventid', 'regdate'];

    public function findbyeventid($eventid)
    {
        $sql = "SELECT * FROM registrant JOIN student ON registrant.sid = student.sid WHERE eventid = $eventid";
        return $this->db->query($sql)->getResultArray();
    }

    public function trackevent($sid)
    {
        $sql = "SELECT * FROM registrant JOIN event ON registrant.eventid = event.eventid WHERE sid = $sid";
        return $this->db->query($sql)->getResultArray();
    }

    public function countregtoday()
    {
        $sql = "SELECT COUNT(*) AS total FROM registrant WHERE regdate = CURDATE()";
        return $this->db->query($sql)->getRowArray();
    }

    public function countregbyevent($eventid)
    {
        $sql = "SELECT COUNT(*) AS total FROM registrant WHERE eventid = $eventid";
        return $this->db->query($sql)->getRowArray();
    }

    public function countregbyeventtoday($eventid)
    {
        $sql = "SELECT COUNT(*) AS total FROM registrant WHERE eventid = $eventid AND regdate = CURDATE()";
        return $this->db->query($sql)->getRowArray();
    }

  
}
