<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSection extends Model
{
    use HasFactory;
    protected $table = 'system_sections';
    protected $primaryKey = 'id';
    protected $fillable = ['section_id','name','status','created_at'];
}
