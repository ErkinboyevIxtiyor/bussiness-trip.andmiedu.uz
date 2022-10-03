<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Structure\Faculty;

class Structure extends Component
{
    public $faculty_name, $faculty_type;

    protected function rules()
    {
        return [
            'faculty_name' => 'required',
            'faculty_type' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function facultySave()
    {
        $validatedData = $this->validate();
        Faculty::create($validatedData);
    }
    public function render()
    {
        $faculty_data = Faculty::all();
        return view('livewire.structure',compact('faculty_data'));
    }
}
