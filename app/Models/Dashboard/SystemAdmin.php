<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemAdmin extends Model
{
    use HasFactory;
    protected $table = 'system_admins';
    protected $primaryKey = 'id';
    protected $fillable = ['second_name','first_name','third_name','email','password','admin_avatar','token','updated_at','status'];
}
