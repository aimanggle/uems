<?php

namespace App\Models;

use CodeIgniter\Model;

class EventCategoryModel extends Model
{
   
    protected $table            = 'eventcategory';
    protected $allowedFields    = ['eventcatid', 'eventcatname'];

}
