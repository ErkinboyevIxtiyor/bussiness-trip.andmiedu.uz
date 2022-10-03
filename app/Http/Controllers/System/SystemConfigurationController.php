<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\SystemAdmin;
use App\Models\System\SystemLogo;
use App\Helpers\Helper;
use App\Models\Structure\Section;
use App\Models\System\SystemSection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class SystemConfigurationController extends Controller
{
    public function app()
    {
        $system_logo = SystemLogo::all();
        return view('layouts.app',compact('system_logo'));
    }
    public function system_configuration()
    {
        $system_logo = SystemLogo::all();
        $system_section = SystemSection::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('system.system_configuration.system_configuration',$data,compact('system_logo','system_section'));
    }
    public function system_logo(Request $request)
    {
        $request->validate([
            'system_logo'=>'required|mimes:jpg,png,jpeg|max:10000',
        ]);

        $system_logo = time() . '-'. '.' .
        $request->system_logo->extension();
        $request->system_logo->move(public_path('system/system_logo'),$system_logo);

        $system_logo_save = new SystemLogo;
        $system_logo_save->system_logo = $system_logo;
        $save = $system_logo_save->save();
        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }
    }
    public function system_logo_update(Request $request,$id)
    {        
        $request->validate([
            'system_logo'=>'required|mimes:jpg,png,jpeg|max:10000',
           ]);
        $input = $request->all();
        $system_logo =$input['system_logo'];

        $system_logo_update = SystemLogo::find($id);

        if($request->hasFile('system_logo')){
            $destination = 'system/system_logo/'.$system_logo_update->system_logo;
            if(File::exists($destination)){
                File::delete($destination);
            }
        }

        $system_logo = time() . '.' .
        $request->system_logo->extension();
        $request->system_logo->move(public_path('system/system_logo'),$system_logo);

        $system_logo_update->system_logo = $system_logo;
        $save = $system_logo_update->save();
        if ($save) {
            return back()->with('update', 'Maʼlumot muvaffaqiyatli o‘zgartirildi!');
        }
    }
    public function system_section(Request $request)
    {
        $request->validate([
            'name'=>'required',
           ]);
           $section_id = Helper::IDGenerator(new SystemSection, 'section_id',3, '303'.date('Hms'));
           $systemSection = new SystemSection;
           $systemSection->section_id= $section_id;
           $systemSection->name= $request->name;
           $save = $systemSection->save();
   
           if ($save) {
               return back()->with('save','Maʼlumot muvaffaqiyatli saqlandi');
           }
    }
    public function system_configuration_edit($id)
    {
        $system_logo = SystemLogo::all();
        $system_section = SystemSection::all();
        $system_section_edit = SystemSection::find($id);
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('system.system_configuration.system_configuration_edit',$data,compact('system_logo','system_section','system_section_edit'));
    }
    public function system_section_update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $system_section_update = SystemSection::find($id);
        $system_section_update->name = $request->name;
        $save = $system_section_update->save();
        if ($save) {
            return back()->with('update', 'Maʼlumot muvaffaqiyatli o‘zgartirildi!');
        }
    }
    public function system_section_delete($id)
    {
        $structure_section = Section::all();
        $system_section = SystemSection::find($id);
        foreach ($structure_section as $section) {
            if ($section->system_section_id == '') {
                DB::delete('delete from system_sections where id = ? ', [$id]);
                return redirect('/system/configuration')->with('delete', 'Maʼlumot muvaffaqiyatli o‘chirildi!');
            }else{
                return back()->with('delete', 'Tegishli maʼlumlar bo‘lganligi uchun o‘chirib bo‘lmadi!');
            }
        }
    }
}
