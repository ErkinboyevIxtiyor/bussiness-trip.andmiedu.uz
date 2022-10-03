<?php

namespace App\Models\Structure;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    protected $primaryKey = 'id';
    protected $fillable = ['section_id', 'section_name','system_section_id','updated_at','status'];
}
