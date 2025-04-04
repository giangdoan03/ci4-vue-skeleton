<?php

namespace App\Models;

use CodeIgniter\Model;

class QrCodeModel extends Model
{
    protected $table = 'qrcodes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'type', 'reference_id', 'custom_url', 'qr_image_url', 'scan_count', 'created_at', 'updated_at'];
    public $timestamps = true;
}
