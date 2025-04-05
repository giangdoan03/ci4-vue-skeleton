<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products'; // Tên bảng sản phẩm trong database
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'name',
        'description',
        'price',
        'image',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
