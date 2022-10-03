<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Dashboard\SystemAdmin;
use App\Models\System\SystemLogo;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

class SystemAdminController extends Controller
{
    public function system_admin(Request $request)
    {
        $search = $request['search'] ?? "" ;
        $system_logo = SystemLogo::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        // $admin_data = SystemAdmin::all()->contains('desc');
        if ($search != "") {
            $admin_data = SystemAdmin::where('second_name', 'LIKE', "%$search%")->orWhere('admin_id', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->get();
        } else {
            $admin_data = DB::table('system_admins')->orderBy('id','desc')->get();
        }
        return view('system.system_admin',$data,compact('admin_data','system_logo','search'));
    }
    public function admin_add()
    {
        $system_logo = SystemLogo::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('system.admin_add',$data,compact('system_logo'));
    }
    public function admin_pdf()
    {
        $system_logo = SystemLogo::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        $admin_data = SystemAdmin::all();
        return view('system.admin_pdf',$data,compact('admin_data','system_logo'));
    }
    public function admin_save(Request $request)
    {
        // $input = $request->all();
        $request->validate([
            'first_name' =>'required',
            'second_name' =>'required',
            'third_name' =>'required',
            'email' =>'required|email|unique:system_admins',
            'password' =>'required|min:8',
            'repassword'=>'required|same:password'
        ]);
        // $admin_id = IdGenerator::generate(['table' => 'system_admins', 'length' => 10, 'prefix' =>'303'.date('ym')]);
        $admin_id = Helper::IDGenerator(new SystemAdmin, 'admin_id',4, '303'.date('m'));
        $admin = new SystemAdmin;
        $admin->admin_id= $admin_id;
        $admin->first_name= $request->first_name;
        $admin->second_name= $request->second_name;
        $admin->third_name= $request->third_name;
        $admin->email= $request->email;
        $admin->password= Hash::make($request->password);
        $save = $admin->save();

        if ($save) {
            return redirect('/system/admin')->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }
        // dd($input);
    }

    public function admin_edit($id)
    {
        $system_logo = SystemLogo::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        $admin_edit = SystemAdmin::find($id);
        return view('system.admin_edit',$data,compact('admin_edit','system_logo'));
    }
    public function account_edit($id)
    {
        $system_logo = SystemLogo::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        $admin_edit = SystemAdmin::find($id);
        return view('system.account_edit',$data,compact('admin_edit','system_logo'));
    }

    public function account_update(Request  $request,$id)
    {
        $request->validate([
            'password'=>'required|min:8',
            'repassword'=>'required|same:password',
           ]);
           $admin = SystemAdmin::find($id);
           $admin->password= Hash::make($request->password);
           $save = $admin->save();
        
        if ($save) {
            return back()->with('update', $admin->second_name . '  ' . $admin->first_name . '  ' . $admin->third_name . ' ning ' . 'maʼlumoti muvaffaqiyatli o‘zgartirildi!');
        }else{
            return back()->with('error', 'Maʼlumot muvaffaqiyatli o‘zgartirildi xato!');
        }
    }
    public function admin_published(Request $request)
    {
        $published = SystemAdmin::find($request->id)->update(['status'=> 1]);
            return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
    }
    public function admin_unpublished(Request $request)
    {
        $published = SystemAdmin::find($request->id)->update(['status'=> 0]);
            return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
    }

}
