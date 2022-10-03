<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\SystemAdmin;
use App\Models\System\SystemLogo;
use Illuminate\Support\Facades\Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Swift_IdGenerator;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        $system_logo = SystemLogo::all();
        return view('login',compact('system_logo'));
    }
    public function register_save(Request $request)
    {
        // $input = $request->all();
        // return dd($input);
        $request->validate([
            'first_name' =>'required',
            'second_name' =>'required',
            'third_name' =>'required',
            'email' =>'required|email|unique:system_admins',
            'password' =>'required|min:8',
        ]);
        $admin_id = IdGenerator::generate(['table' => 'system_admins', 'length' => 8, 'prefix' =>'303'.date('y')]);
        $admin = new SystemAdmin();
        $admin->admin_id= $admin_id;
        $admin->first_name= $request->first_name;
        $admin->second_name= $request->second_name;
        $admin->third_name= $request->third_name;
        $admin->email= $request->email;
        $admin->password= Hash::make($request->password);
        $save = $admin->save();

        if ($save) {
            return redirect('/dashboard/login')->with('save','Ma‘lumot muvaffaqiyatli saqlandi');
        }
        // dd($input);
    }
    public function login_check(Request $request)
    {
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:8',
        ]);

        $userInfo = SystemAdmin::where('email','=',$request->email)->first();

        if(!$userInfo){
            return back()->with('error','Login xato');
        }elseif ($userInfo->status == 0) {
            return back()->with('error','Tizimga kirishga ruxsat etilmagan');
        }else{
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser',$userInfo->id);
                return redirect('/')->with('save','Siz tizimga muvaffaqiyatli kirdingiz');
            }
            else{
                return back()->with('error','Parol xato');
            }
        }
    }

}
