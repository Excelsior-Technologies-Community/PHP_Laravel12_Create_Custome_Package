<?php

namespace DemoVendor\DemoPackage\Models;

use Illuminate\Database\Eloquent\Model;

class PackageLog extends Model
{
    protected $table = 'package_logs';
    protected $fillable = ['url', 'ip_address', 'visited_at'];
    public $timestamps = false;
}