<?php

namespace App\Http\Controllers\Employee;

use App\Exports\EmployeeExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\SystemAdmin;
use App\Models\System\SystemLogo;
use App\Models\Employee\Employee;
use App\Models\System\Position;
use App\Models\Structure\Section;
use App\Helpers\Helper;
use App\Models\BusinessTrip\BusinessTrip;
use App\Models\Employee\EmployeePosition;
use App\Models\System\SystemSection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function employee(Request $request)
    {
        $search = $request['search'] ?? "" ;
        $system_logo = SystemLogo::all();
        if ($search != "") {
            $employee = Employee::where('second_name', 'LIKE', "%$search%")->orWhere('employee_id', 'LIKE', "%$search%")->orWhere('employee_passport', 'LIKE', "%$search%")->get();
        } else {
            $employee = DB::table('employees')->orderBy('id','desc')->get();
        }
        $position = Position::all();
        $employee_total = Employee::all()->count();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('employee.employee.employee',$data,compact('system_logo','employee','position','search','employee_total'));
    }
    public function employee_add()
    {
        $position = Position::all();
        $system_logo = SystemLogo::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('employee.employee.employee_add',$data,compact('system_logo','position'));
    }
    public function employee_save(Request $request)
    {
        // $input = $request->all();
        // return dd ($input);
        $request->validate([
            'second_name'=>'required',
            'first_name'=>'required',
            'third_name'=>'required',
            'employee_passport'=>'required|unique:employees',
            'employee_gender'=>'required',
            'position_id'=>'required',
        ]);
        $employee_id = Helper::IDGenerator(new Employee, 'employee_id',4, '303'.date('ym'));
        $position_name = $request->position_id;
        $position = Position::find($position_name);
        $position_name_save = $position->name;
        // dd($position_name2);
        // return dd ($employee_id);
        $employee = new Employee;
        $employee->employee_id= $employee_id;
        $employee->position_id= $request->position_id;
        $employee->employee_position= $position_name_save;
        $employee->second_name= $request->second_name;
        $employee->first_name= $request->first_name;
        $employee->third_name= $request->third_name;
        $employee->employee_passport= $request->employee_passport;
        $employee->employee_gender= $request->employee_gender;
        $save = $employee->save();

        if ($save) {
            return redirect('/employee/employee')->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }else{
            return back()->with('error','Saqlab bolmadi');
        }
    }
    public function employee_edit($id)
    {
        $system_logo = SystemLogo::all();
        $employee = Employee::find($id);
        $position = Position::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('employee.employee.employee_edit',$data,compact('system_logo','employee','position'));
    }
    public function employee_position($id)
    {
        $system_logo = SystemLogo::all();
        $employee = Employee::find($id);
        $position = Position::all();
        $section = Section::all();
        $system_section = SystemSection::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('employee.employee.employee_position',$data,compact('system_logo','employee','section','system_section','position'));
    }
    public function employee_position_save(Request $request)
    {
        $request->validate([
            'position_id'=>'required',
            'section_id'=>'required',
        ]);
        $employee_position = new EmployeePosition();
        $employee_position->employee_id= $request->employee_id;
        $employee_position->position_id= $request->position_id;
        $employee_position->section_id= $request->section_id;
        $save = $employee_position->save();

        if ($save) {
            return redirect('/employee/employee')->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }else{
            return back()->with('error','Saqlab bolmadi');
        }
    }
    public function employee_update($id)
    {
        $system_logo = SystemLogo::all();
        $employee = Employee::find($id);
        $position = Position::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('employee.employee.employee_update',$data,compact('system_logo','employee','position'));
    }
    public function employee_update_save(Request $request, $id)
    {
        $request->validate([
            'second_name'=>'required',
            'first_name'=>'required',
            'third_name'=>'required',
            'employee_passport'=>'required',
            'employee_gender'=>'required',
            'position_id'=>'required',
        ]);
        $employee = Employee::find($id);
        $position_name = $request->position_id;
        $position = Position::find($position_name);
        $position_name_save = $position->name;
        $employee->position_id= $request->position_id;
        $employee->employee_position= $position_name_save;
        $employee->second_name= $request->second_name;
        $employee->first_name= $request->first_name;
        $employee->third_name= $request->third_name;
        $employee->employee_passport= $request->employee_passport;
        $employee->employee_gender= $request->employee_gender;
        $save = $employee->save();

        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli o‘zgartirildi');
        }else{
            return back()->with('error','Saqlab bolmadi');
        }
    }
    public function faculty_published(Request $request)
    {
        $published = Employee::find($request->id)->update(['status'=> 1]);
            return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
    }
    public function faculty_unpublished(Request $request)
    {
        $published = Employee::find($request->id)->update(['status'=> 0]);
            return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
    }
    public function employee_serach(Request $request)
    {
        $system_logo = SystemLogo::all();
        // $employee = Employee::all();
        $position = Position::all();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        $search = $request->search_employee;
        $employee = Employee::where('first_name', 'LIKE', '%'.$search.'%');
        return view('employee.employee.employee',$data,compact('system_logo','position','employee'));
    }
    public function employee_export()
    {
        $date = date('d-m-Y-H-i-s');
        return Excel::download(new EmployeeExport, "$date.xlsx");
    }
}
