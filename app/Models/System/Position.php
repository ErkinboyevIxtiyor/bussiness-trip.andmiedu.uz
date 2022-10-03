<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['position_id','name','position','status','created_at'];
}
