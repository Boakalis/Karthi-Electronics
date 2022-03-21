<?php

namespace App\Http\Livewire;

use App\Models\District as ModelsDistrict;
use App\Models\State;
use Livewire\Component;

class District extends Component
{
    public $status ,$name ,$datas,$data ,$states ,$state;


    protected $listeners = ['resetData'];

    public function resetData()
    {
        $this->name = null;
        $this->status =1 ;
        $this->data = null;
        $this->state = null;
    }


    public function mount()
    {
        $this->status = 1;
        $this->data = null;
    }

    protected $rules = [
        'name' => 'required|max:255|unique:districts,name',
        'status' => 'required',
        'state' => 'required',
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
        ModelsDistrict::create([
            'name' => $this->name,
            'status' => $this->status,
            'state_id' => $this->state,
        ]);
        $this->emit('stored');
    }

    public function edit($id)
    {
        $this->data = ModelsDistrict::find($id);
        $this->name =$this->data->name;
        $this->status = $this->data->status;
        $this->state = $this->data->state_id;
        $this->emit('editData');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required|max:255|unique:states,name,'.$this->data->id,
            'status' => 'required',
            'state' => 'required',
        ]);
        ModelsDistrict::where('id',$this->data->id)->update([
            'name' => $this->name,
            'status' => $this->status,
            'state_id' => $this->state,
        ]);
        $this->emit('updated');
    }

    public function changeState($value)
    {
        $this->state = $value;
    }

    public function render()
    {
        $this->states = State::where('status',1)->get();
        $this->datas = ModelsDistrict::get();
        return view('livewire.district')->extends('admin.layouts.master')->section('content');

    }
}
