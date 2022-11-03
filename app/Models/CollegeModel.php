<?php

namespace App\Models;

use CodeIgniter\Model;

class CollegeModel extends Model
{
    protected $table            = 'college';
    protected $primaryKey       = 'collegeid';
    protected $allowedFields    = ['collegeid', 'collegename', 'collegeshortname'];

}
