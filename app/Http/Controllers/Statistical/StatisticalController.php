<?php

namespace App\Http\Controllers\Statistical;

use App\Http\Controllers\Controller;
use App\Models\BusinessTrip\BusinessTrip;
use App\Models\Dashboard\SystemAdmin;
use App\Models\Employee\Employee;
use App\Models\System\Position;
use App\Models\System\SystemLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticalController extends Controller
{
    public function statistical()
    {
        $system_logo = SystemLogo::all();
        $employee = Employee::all();
        $employees_count = Employee::all()->count();
        $position = Position::all();
        $business_trip = BusinessTrip::all();
        $business_trip_statistical = BusinessTrip::where('statistical', '1')->count();
        // $business_trip_statistical = BusinessTrip::where('status','1')->count();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        // //$data = SystemAdmin::find(Auth::id());
        // $employee_info = array();
        // foreach ($employee as $value) {
        //     $employee_info[$value->id] = 0;
        // }
        // //dd($employee_info);
        // if($business_trip){
        //     foreach ($business_trip as $value) {
        //         $business_trip_count = BusinessTrip::where('status','1')->where('employee_id',$value->id)->count();
        //         $employee_info[$value->id] = $business_trip_count;
        //     }
        // }
        // dd($employee_info);
        return view('statistical.statistical',$data,compact('system_logo','employee','position','business_trip','business_trip_statistical',));
    }
}
