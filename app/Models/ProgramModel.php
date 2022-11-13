<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'program';
    protected $allowedFields    = ['programid', 'programname', 'programdesc','collegeid'];

    
}
