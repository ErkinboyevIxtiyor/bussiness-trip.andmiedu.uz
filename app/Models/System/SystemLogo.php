<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLogo extends Model
{
    use HasFactory;
    protected $table = 'system_logos';
    protected $primaryKey = 'id';
    protected $fillable = ['system_logo','status','created_at'];
}
