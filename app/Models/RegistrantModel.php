<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrantModel extends Model
{
    
    protected $table            = 'registrant';
    protected $primaryKey       = 'regid';
    protected $useSoftDeletes   = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
    protected $allowedFields    = ['regid', 'sid', 'eventid', 'regdate', 'collegeid', 'regno'];

    public function findbyeventid($eventid)
    {
        $sql = "SELECT * FROM registrant JOIN student ON registrant.sid = student.sid JOIN college ON registrant.collegeid = college.collegeid JOIN program ON student.programid = program.programid WHERE eventid = $eventid";
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

    public function countregfirstdate($currentdate)
    {
        $sql = "SELECT COUNT(*) AS total FROM registrant WHERE date(regdate) = '$currentdate'";
        return $this->db->query($sql)->getRowArray();
    }

    public function countregseconddate($seconddate)
    {
        $sql = "SELECT COUNT(*) AS total FROM registrant WHERE date(regdate) = '$seconddate'";
        return $this->db->query($sql)->getRowArray();
    }

    public function countregthirddate($thirddate)
    {
        $sql = "SELECT COUNT(*) AS total FROM registrant WHERE date(regdate) = '$thirddate'";
        return $this->db->query($sql)->getRowArray();
    }

    public function countregfourthdate($fourthdate)
    {
        $sql = "SELECT COUNT(*) AS total FROM registrant WHERE date(regdate) = '$fourthdate'";
        return $this->db->query($sql)->getRowArray();
    }

    public function countregfifthdate($fifthdate)
    {
        $sql = "SELECT COUNT(*) AS total FROM registrant WHERE date(regdate) = '$fifthdate'";
        return $this->db->query($sql)->getRowArray();
    }

    public function countregsixthdate($sixthdate)
    {
        $sql = "SELECT COUNT(*) AS total FROM registrant WHERE date(regdate) = '$sixthdate'";
        return $this->db->query($sql)->getRowArray();
    }

    public function countregseventhdate($seventhdate)
    {
        $sql = "SELECT COUNT(*) AS total FROM registrant WHERE date(regdate) = '$seventhdate'";
        return $this->db->query($sql)->getRowArray();
    }

    //join table student and count by collegeid
    public function countregbycollege($collegeid)
    {
        $sql = "SELECT COUNT(DISTINCT collegeid,sid) AS total FROM registrant WHERE collegeid = $collegeid";
        return $this->db->query($sql)->getRowArray();
    }

    //count register distinct by sid
    public function countregbysid()
    {
        $sql = "SELECT COUNT(DISTINCT sid) AS totalreg FROM registrant";
        return $this->db->query($sql)->getRowArray();
    }

    //count total register between 2 date
    public function countregbetween($firstdate, $seconddate)
    {
        $sql = "SELECT COUNT(*) AS total FROM registrant WHERE date(regdate) BETWEEN '$firstdate' AND '$seconddate'";
        return $this->db->query($sql)->getRowArray();
    }              
}
