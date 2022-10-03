<?php

namespace App\Models\BusinessTrip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessTrip extends Model
{
    use HasFactory;
    protected $table = 'business_trips';
    protected $primaryKey = 'id';
    protected $fillable = ['trip_id','employee_id','employee_position','trip_adress','trip_day','trip_days','trip_begin_date ','trip_end_date','employee_passport','order_date','order_number','employee_responsible_position','employee_responsible_name','shipping_adress','shipping_date','status','created_at','updated_at'];
}
