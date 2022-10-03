<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard\SystemAdmin;
use App\Models\System\Position;
use App\Models\System\SystemLogo;
use App\Helpers\Helper;
use App\Models\Employee\Employee;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    public function system_position()
    {
        $system_logo = SystemLogo::all();
        $position = DB::table('positions')->orderBy('id','desc')->get();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('system.system_position.system_position',$data,compact('system_logo','position'));
    }
    public function system_position_save(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $position_id = Helper::IDGenerator(new Position, 'position_id',3, '303-');
        $position = new Position;
        $position->position_id= $position_id;
        $position->name= $request->name;
        $save = $position->save();

        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }
    }
    public function position_published(Request $request)
    {
        $published = Position::find($request->id)->update(['status'=> 1]);
            return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
    }
    public function position_unpublished(Request $request)
    {
        $published = Position::find($request->id)->update(['status'=> 0]);
            return back()->with('post-category-published', 'Status muvaffaqiyatli o‘zgartirildi!');
    }
    public function system_position_edit($id)
    {
        $system_logo = SystemLogo::all();
        $position_edit = Position::find($id);
        $position = DB::table('positions')->orderBy('id','desc')->get();
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        return view('system.system_position.system_position_edit',$data,compact('system_logo','position','position_edit'));
    }
    public function system_position_update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $position = Position::find($id);
        $position->name= $request->name;
        $save = $position->save();

        if ($save) {
            return back()->with('save','Maʼlumot muvaffaqiyatli saqlandi');
        }
    }
    public function position_delete($id)
    {
        $position = Position::find($id);
        $employee = Employee::all();
        // foreach ($employee as $item) {
        //     if ($position->id == $item->position_id) {
        //         return back()->with('delete', 'Tegishli maʼlumotlar bo‘lganligi uchun o‘chirib bo‘lmadi!');;
        //     }elseif ($position->id != $item->position_id) {
        //         return dd($position->id,$item->position_id);
        //     }
        // }
        // DB::delete('delete from positions where id = ? ', [$id]);
        // return redirect('/system/position')->with('delete', 'Maʼlumot muvaffaqiyatli o‘chirildi!');
    }
}
