<?php

namespace App\Models\Curriculum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationYear extends Model
{
    use HasFactory;
    protected $table = 'education_years';
    protected $primaryKey = 'id';
    protected $fillable = ['name','current_status','status_test','status','created_at','updated_at'];
}
