<?php

namespace App\Models;

use CodeIgniter\Model;

class BusinessModel extends Model
{
    protected $table = 'businesses'; // Tên bảng doanh nghiệp trong database
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'name',
        'description',
        'address',
        'phone',
        'email',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
