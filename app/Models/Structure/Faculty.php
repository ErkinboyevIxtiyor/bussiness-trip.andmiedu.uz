<?php

namespace App\Models\Structure;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Structure\DepartmentSectionController;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Faculty extends Model
{
    use HasFactory;
    protected $table = 'faculties';
    protected $primaryKey = 'id';
    protected $fillable = ['faculty_id', 'faculty_name','faculty_type','updated_at','status'];

    public function department_section(){
        return $this -> hasOne(DepartmentSectionController::class,'faculty_id','id');
        
    }
}
