<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model
{
    protected $table = 'persons'; // Tên bảng người đại diện trong database
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'full_name',
        'position',
        'email',
        'phone',
        'address',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
