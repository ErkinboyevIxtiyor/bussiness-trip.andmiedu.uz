<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BusinessTrip\BusinessTrip;
use Illuminate\Http\Request;
use App\Models\Dashboard\SystemAdmin;
use App\Models\Employee\Employee;
use Illuminate\Support\Facades\Hash;
use App\Models\System\SystemLogo;

class AdminController extends Controller
{

    public function dashboard(Request $request)
    {
        $system_logo = SystemLogo::all();
        $employee = Employee::all()->count();
        $bussiness_trip = BusinessTrip::all()->count();
        $admin = SystemAdmin::all()->count();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('index',$data,compact('system_logo','employee','bussiness_trip','admin'));
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/dashboard/login')->with('save','Siz tizimda muvaffaqiyatli chiqtingiz');
        }
    }
}
