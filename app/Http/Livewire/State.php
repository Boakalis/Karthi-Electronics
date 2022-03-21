<?php

namespace App\Http\Livewire;

use App\Models\State as ModelsState;
use Livewire\Component;
use Illuminate\Validation\Rule;

class State extends Component
{
    public $status ,$name ,$datas,$data;


    protected $listeners = ['resetData'];

    public function resetData()
    {
        $this->name = null;
        $this->status =1 ;
        $this->data = null;
    }


    public function mount()
    {
        $this->status = 1;
        $this->data = null;
    }

    protected $rules = [
        'name' => 'required|max:255|unique:states,name',
        'status' => 'required',
    ];


    public function changeEvent($value)
    {
        $this->status = $value ;
    }

    public function updated($value)
    {
        $this->validateOnly($value);
    }

    public function save()
    {
        $this->validate();
        ModelsState::create([
            'name' => $this->name,
            'status' => $this->status,
        ]);
        $this->emit('stored');
    }

    public function edit($id)
    {
        $this->data = ModelsState::find($id);
        $this->name =$this->data->name;
        $this->status = $this->data->status;
        $this->emit('editData');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required|max:255|unique:states,name,'.$this->data->id,
            'status' => 'required',
        ]);
        ModelsState::where('id',$this->data->id)->update([
            'name' => $this->name,
            'status' => $this->status,
        ]);
        $this->emit('updated');
    }

    public function render()
    {
        $this->datas = ModelsState::get();
        return view('livewire.state')->extends('admin.layouts.master')->section('content');

    }
}
