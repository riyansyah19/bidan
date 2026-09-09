<?php

namespace App\Models;

use CodeIgniter\Model;

class icd extends Model
{
    protected $table = 'master_icd10';
    protected $primaryKey = 'id_icd';
    protected $useTimestamps = True;
    protected $allowedFields = ['id_icd', 'vol_name', 'vol_code'];
}
