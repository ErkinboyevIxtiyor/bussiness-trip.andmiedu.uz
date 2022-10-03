<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\SystemAdmin;
use App\Models\System\SystemLogo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    public function profil($id)
    {
        $system_logo = SystemLogo::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        $profil_edit = SystemAdmin::find($id);
        return view('profil.profil',$data,compact('profil_edit','system_logo'));
    }

    public function profil_update(Request  $request,$id)
    {
        $request->validate([
            'second_name'=>'required',
            'first_name'=>'required',
            'third_name'=>'required',
           ]);
        $input = $request->all();
        $second_name =$input['second_name'];
        $first_name =$input['first_name'];
        $third_name =$input['third_name'];
        $admin_update = SystemAdmin::find($id);
        
        $admin_update->second_name=$second_name;
        $admin_update->first_name=$first_name;
        $admin_update->third_name=$third_name;
        $save = $admin_update->save();
        if ($save) {
            return back()->with('update', 'Maʼlumot muvaffaqiyatli o‘zgartirildi!');
        }else{
            return back()->with('error', 'Maʼlumot muvaffaqiyatli o‘zgartirildi xato!');
        }
    }

    public function profil__email_update(Request  $request,$id)
    {
        $request->validate([
            'email'=>'required',
            'parol'=>'required|min:8',
            'parol_tastig‘i'=>'required|same:parol',
           ]);
           $admin = SystemAdmin::find($id);
           $admin->email= $request->email;
           $admin->password= Hash::make($request->parol);
           $save = $admin->save();
        
        if ($save) {
            return back()->with('update', $admin->second_name . '  ' . $admin->first_name . '  ' . $admin->third_name . ' ning ' . 'maʼlumoti muvaffaqiyatli o‘zgartirildi!');
        }else{
            return back()->with('error', 'Maʼlumot muvaffaqiyatli o‘zgartirildi xato!');
        }
    }
    public function profil__avatar_update(Request  $request,$id)
    {
        $request->validate([
            'admin_avatar'=>'required|mimes:jpg,png,jpeg|max:10000',
           ]);
        $input = $request->all();
        $full_name =$input['full_name'];
        $admin_avatar =$input['admin_avatar'];
        $project_update = SystemAdmin::find($id);
        
           if($request->hasFile('admin_avatar')){
            $destination = 'admin_avatar/'.$project_update->admin_avatar;
            if(File::exists($destination)){
                File::delete($destination);
            }
        }
        $admin_avatar = time() . '-' . $request->full_name . '.' .
        $request->admin_avatar->extension();
        $request->admin_avatar->move(public_path('admin_avatar/'),$admin_avatar);

        // $project_update->full_name =$full_name;
        $project_update->admin_avatar=$admin_avatar;
        $project_update->save();
        return back()->with('update', $project_update->second_name . '  ' . $project_update->first_name . '  ' . $project_update->third_name . ' ning ' . 'maʼlumoti muvaffaqiyatli o‘zgartirildi!');
    }
}
