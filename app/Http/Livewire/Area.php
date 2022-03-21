<?php

namespace App\Http\Livewire;

use App\Models\Area as ModelsArea;
use App\Models\District;
use App\Models\Pincode;
use App\Models\State;
use Livewire\Component;

class Area extends Component
{
    public $status ,$name ,$datas,$data ,$states ,$districts, $district ,$state ,$currentAreaId,$pincode,$pincodeName;


    protected $listeners = ['resetData','setCurrentAreaId'];


    public function setCurrentAreaId($value)
    {
        $this->pincode = null;
        $this->pincodeName = null;
        $this->setCurrentAreaId = $value;
        $this->emit('addPin');
    }

    public function addPin()
    {
        $validatedData = $this->validate([
            'pincodeName' => 'required|max:255|unique:pincodes,name',
            'pincode' => 'required|integer|unique:pincodes,pincode',
            'setCurrentAreaId' => 'required',
        ]);
        Pincode::create([
            'area_id' => $this->setCurrentAreaId,
            'pincode' => $this->pincode,
            'name' => $this->pincodeName,
        ]);
        $this->emit('pinAdded');
    }

    public function resetData()
    {
        $this->name = null;
        $this->status =1 ;
        $this->data = null;
        $this->state = null;
        $this->districts = null;
    }


    public function mount()
    {
        $this->status = 1;
        $this->data = null;
        $this->pincode = null;
        $this->pincodeName = null;
        $this->setCurrentAreaId = null;
    }

    protected $rules = [
        'name' => 'required|max:255|unique:areas,name',
        'status' => 'required',
        'state' => 'required',
        'district' => 'required',
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
        ModelsArea::create([
            'name' => $this->name,
            'status' => $this->status,
            'state_id' => $this->state,
            'district_id' => $this->district,
        ]);
        $this->emit('stored');
    }

    public function edit($id)
    {
        $this->data = ModelsArea::find($id);
        $this->name =$this->data->name;
        $this->status = $this->data->status;
        $this->state = $this->data->state_id;
        $this->districts = District::where([['status',1],['state_id',$this->state]])->get();
        $this->district = $this->data->district_id;
        $this->emit('editData');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required|max:255|unique:states,name,'.$this->data->id,
            'status' => 'required',
            'state' => 'required',
            'district' => 'required',
        ]);
        ModelsArea::where('id',$this->data->id)->update([
            'name' => $this->name,
            'status' => $this->status,
            'state_id' => $this->state,
            'district_id' => $this->district,
        ]);
        $this->emit('updated');
    }

    public function changeState($value)
    {
        $this->state = $value;
        $this->districts = District::where([['state_id',$this->state],['status',1]])->get();
    }

    public function changeDistrict($value)
    {
        $this->district = $value;
    }

    public function deletePin($value)
    {
        Pincode::where('id',$value)->delete();
    }

    public function render()
    {
        $this->states = State::where('status',1)->get();
        $this->datas = ModelsArea::get();
        if ($this->setCurrentAreaId != null) {
            $this->pins = Pincode::where('area_id',$this->setCurrentAreaId)->get();
        }
        return view('livewire.area')->extends('admin.layouts.master')->section('content');

    }
}
