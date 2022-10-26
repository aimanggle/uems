<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'student';
    protected $primaryKey       = 'sid';
    protected $allowedFields    = ['sid', 'studentid', 'fullname', 'programid', ];

    public function detail($studentid)
    {
        $sql = "SELECT * FROM `student` WHERE studentid = '$studentid'";
        return $this->db->query($sql)->getRow();
    }
}
