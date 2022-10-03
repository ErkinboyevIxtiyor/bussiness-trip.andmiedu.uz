<?php

namespace App\Http\Controllers\Structure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\SystemAdmin;
use App\Models\Structure\Faculty;
use App\Models\System\SystemLogo;
use App\Models\Structure\DepartmentSection;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

class DepartmentSectionController extends Controller
{
    public function app()
    {
        $system_logo = SystemLogo::all();
        return view('layouts.app',compact('system_logo'));
    }
    public function department_section()
    {
        $system_logo = SystemLogo::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        $faculty_data = Faculty::all();
        $department_data = DepartmentSection::all();
        return view('structure.department.departmentSection',$data,compact('faculty_data','department_data','system_logo'));
    }
    public function department_section_save(Request $request)
    {
        $request->validate([
            'faculty_id' =>'required',
            'name' =>'required',
        ]);
        $faculty_section_id  = Helper::IDGenerator(new DepartmentSection, 'faculty_section_id',3,'303-');
        $department = new DepartmentSection;
        $department->faculty_section_id = $faculty_section_id;
        $department->faculty_id = $request->faculty_id;
        $department->name = $request->name;
        $save = $department->save();
        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }
    }
    public function department_edit($id)
    {
        $system_logo = SystemLogo::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        $faculty_data = Faculty::all();
        $department_data = DepartmentSection::all();
        $department_edit = DepartmentSection::find($id);
        return view('structure.department.department_edit',$data,compact('faculty_data','department_data','department_edit','system_logo'));
    }
    public function department_update(Request $request, $id)
    {
        $request->validate([
            'faculty_id' =>'required',
            'name' =>'required',
        ]);
        $department = DepartmentSection::find($id);
        $department->faculty_id = $request->faculty_id;
        $department->name = $request->name;
        $save = $department->save();
        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli o‘zgartirildi!');
        }
    }
    public function department_delete($id)
    {
        $delete = DB::delete('delete from department_sections where id = ? ', [$id]);
        return redirect('structure/faculty')->with('delete', 'Maʼlumot muvaffaqiyatli o‘chirildi!');      
    }
}
