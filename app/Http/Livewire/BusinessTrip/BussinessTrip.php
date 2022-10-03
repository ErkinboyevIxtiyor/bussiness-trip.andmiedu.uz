<?php

namespace App\Http\Livewire\BusinessTrip;
use App\Models\Employee\Employee;
use App\Models\System\SystemLogo;
use App\Models\Dashboard\SystemAdmin;
use App\Models\System\Position;
use Livewire\Component;

class BussinessTrip extends Component
{
    public $employee;
    public $employee_id;
    public $employee_position;
    public $position_id;
    public function mount()
    {
        $this->employee = Employee::all();
        if ($this->employee_id != '') {
            $this->employee_position = Position::where('id', $this->employee_id)->get();
        }else{
            $this->employee_position = [];
        }
    }
    public function updatedemployee_id()
    {
        dd('7');
    }
    public function render()
    {
        $data = ['LoggedUserInfo'=>SystemAdmin::where('id','=',session('LoggedUser'))->first()];
        $system_logo = SystemLogo::all();
        $position_date = Position::all();
        return view('livewire.business-trip.bussiness-trip',$data,compact('system_logo','position_date'));
    }
}
