<?php

namespace App\Models;

use CodeIgniter\Model;

class QrScanModel extends Model
{
    protected $table = 'qr_scans';
    protected $primaryKey = 'id';
    protected $allowedFields = ['qr_code_id', 'scan_time', 'device_info', 'ip_address', 'location', 'created_at'];
    public $timestamps = true;
}
