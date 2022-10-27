<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'email', 'username', 'password', 'role', 'userstat', 'created_date', ];


}
