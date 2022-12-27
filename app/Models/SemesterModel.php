<?php

namespace App\Models;

use CodeIgniter\Model;

class SemesterModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'semester';
    protected $primaryKey       = 'semid';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['s1startdate', 's2enddate', 'shortstartdate', 'shortenddate', 's2startdate', 's2enddate'];

}
