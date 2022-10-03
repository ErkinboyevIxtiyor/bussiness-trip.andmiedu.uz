<?php

namespace App\Models\Structure;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Structure\Faculty;

class DepartmentSection extends Model
{
    use HasFactory;
    protected $table = 'department_sections';
    protected $primaryKey = 'id';
    protected $fillable = ['name','faculty_id','updated_at','status'];
    public function faculty(){
        return $this -> belongsTo(Faculty::class) ;
    }
}
