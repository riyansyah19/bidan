<?php

namespace App\Models;

use CodeIgniter\Model;

class usermodel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_user', 'username', 'password', 'confirm_password', 'role'];
}
