<?php

namespace App\Http\Controllers\Curriculum;

use App\Http\Controllers\Controller;
use App\Models\Curriculum\EducationYear;
use App\Models\Dashboard\SystemAdmin;
use App\Models\System\SystemLogo;
use Illuminate\Http\Request;

class EducationYearController extends Controller
{
    public function education_year()
    {
        $system_logo = SystemLogo::all();
        $education_year = EducationYear::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('Curriculum.Education-Year.education_year',$data, compact('system_logo','education_year'));
    }
    public function education_year_save(Request $request)
    {
        // $input = $request->all();
        // return $input;
        $request->validate([
            'name'=>'required',
        ]);
        if ($request->current_status == "on") {
            $current_status_on = 1;
        }elseif ($request->current_status == "") {
            $current_status_on = 0;
        }
        $education_year = new EducationYear;
        $education_year->name= $request->name;
        $education_year->current_status= $current_status_on;
        $save = $education_year->save();

        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }
    }
    public function education_year_edit($id)
    {
        $system_logo = SystemLogo::all();
        $education_year = EducationYear::all();
        $education_year_edit = EducationYear::find($id);
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('Curriculum.Education-Year.education_year_edit',$data, compact('system_logo','education_year','education_year_edit'));
    }
    public function education_year_update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
        ]);
        if ($request->current_status == "on") {
            $current_status_on = 1;
        }elseif ($request->current_status == "") {
            $current_status_on = 0;
        }
        $education_year = EducationYear::find($id);
        $education_year->name= $request->name;
        $education_year->current_status= $current_status_on;
        $save = $education_year->save();

        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli o‘zgartirildi');
        }
    }
}
