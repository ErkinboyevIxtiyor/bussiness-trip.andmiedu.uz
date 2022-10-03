<?php

namespace App\Http\Controllers\Structure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\SystemAdmin;
use App\Models\Structure\Faculty;
use App\Models\Structure\DepartmentSection;
use App\Models\System\SystemLogo;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

class FacultyController extends Controller
{
    public function faculty()
    {
        $system_logo = SystemLogo::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        $faculty_data = Faculty::all();
        return view('structure.faculty.faculty',$data,compact('faculty_data','system_logo'));
    }
    public function faculty_save(Request $request)
    {
        // $input = $request->all();
        // return dd($input);
        $request->validate([
            'faculty_name' =>'required',
            'faculty_type' =>'required',
        ]);
        $faculty_id = Helper::IDGenerator(new Faculty, 'faculty_id',3, '303-');
        $faculty = new Faculty;
        $faculty->faculty_id= $faculty_id;
        $faculty->faculty_name= $request->faculty_name;
        $faculty->faculty_type= $request->faculty_type;
        $save = $faculty->save();

        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }
        // dd($input);
    }

    public function faculty_delete($id)
    {
        $department_data = DepartmentSection::all();
        $faculty_edit = Faculty::find($id);
            foreach ($department_data as $department) {
                if ( $faculty_edit->id === $department -> faculty_id) {
                    return redirect('structure/faculty')->with('delete', 'Tegishli maʼlumlar bo‘lganligi uchun o‘chirib bo‘lmadi!');
                }else {
                    DB::delete('delete from faculties where id = ? ', [$id]);
                    return redirect('structure/faculty')->with('delete', 'Maʼlumot muvaffaqiyatli o‘chirildi!');
                }
            }       
    }

    public function faculty_edit($id)
    {
        $system_logo = SystemLogo::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        $faculty_edit = Faculty::find($id);
        $faculty_data = Faculty::all();
        return view('structure.faculty.faculty_edit',$data,compact('faculty_edit','faculty_data','system_logo'));
    }

    public function faculty_update(Request  $request,$id)
    {
        $request->validate([
            'faculty_name'=>'required',
            'faculty_type'=>'required',
           ]);
           $faculty = Faculty::find($id);
           $faculty->faculty_name= $request->faculty_name;
           $faculty->faculty_type= $request->faculty_type;
           $save = $faculty->save();
        
        if ($save) {
            return back()->with('update', 'Maʼlumot muvaffaqiyatli o‘zgartirildi!');
        }else{
            return back()->with('error', 'Maʼlumot muvaffaqiyatli o‘zgartirildi xato!');
        }
    }

    public function faculty_published(Request $request)
{
    $published = Faculty::find($request->id)->update(['status'=> 1]);
        return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
}
public function faculty_unpublished(Request $request)
{
    $published = Faculty::find($request->id)->update(['status'=> 0]);
        return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
}

}

