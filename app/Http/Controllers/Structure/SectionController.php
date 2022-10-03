<?php

namespace App\Http\Controllers\Structure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\SystemAdmin;
use App\Models\Structure\Faculty;
use App\Models\System\SystemLogo;
use App\Models\System\SystemSection;
use App\Models\Structure\Section;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function section()
    {
        $system_logo = SystemLogo::all();
        $section_data = Section::all();
        $system_section = SystemSection::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('structure.section.section',$data,compact('system_logo','section_data','system_section'));
    }
    public function section_save(Request $request)
    {
        $request->validate([
            'system_section_id' =>'required',
            'section_name' =>'required',
        ]);
        $section_id  = Helper::IDGenerator(new Section, 'section_id',3,'303-');
        $section = new Section;
        $section->section_id = $section_id;
        $section->system_section_id = $request->system_section_id;
        $section->section_name = $request->section_name;
        $save = $section->save();
        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }
    }
    public function section_edit($id)
    {
        $system_logo = SystemLogo::all();
        $section_data = Section::all();
        $section_edit = Section::find($id);
        $system_section = SystemSection::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('structure.section.section_edit',$data,compact('system_logo','section_data','system_section','section_edit'));
    }
    public function section_update(Request $request,$id)
    {
        $request->validate([
            'system_section_id' =>'required',
            'section_name' =>'required',
        ]);
        // $section_id  = Helper::IDGenerator(new Section, 'section_id',3,'303-');
        $section = Section::find($id);
        $section->system_section_id = $request->system_section_id;
        $section->section_name = $request->section_name;
        $save = $section->save();
        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli o‘zgartirildi');
        }
    }
    public function section_delete($id)
    {
        DB::delete('delete from sections where id = ? ', [$id]);
         return redirect('/structure/section')->with('delete', 'Maʼlumot muvaffaqiyatli o‘chirildi!');    
    }
    public function section_published(Request $request)
    {
        $published = Section::find($request->id)->update(['status'=> 1]);
            return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
    }
    public function section_unpublished(Request $request)
    {
        $published = Section::find($request->id)->update(['status'=> 0]);
            return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
    }
}
