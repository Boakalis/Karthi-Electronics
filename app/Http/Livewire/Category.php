<?php

namespace App\Http\Livewire;

use App\Models\admin\ImageUpload;
use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Category extends Component
{
    use WithFileUploads;
    public $name , $image ,$slug ,$status =1 ,$categories ,$editId ,$data;

    protected $listeners = [
        'resetData'
    ];

    public function mount()
    {

    }

    protected $rules = [
        'name' => 'required|max:255|string',
        'status' => 'required'
    ];


    public function save()
    {
        if ($this->editId != null) {
            $validatedData = $this->validate([
                'name' => 'required|max:255|unique:categories,name,'.$this->editId,
                'status' => 'required',
                'image' => 'nullable|image',
            ]);

            $data = [
                'name' => $this->name,
                'slug' => Str::slug($this->name) ,
                'status' => $this->status,
            ];

            if ($this->image != NULL) {
                $image =   $this->image->store('public/media');
                $exploded_image =explode('/',$image);
                $data['image'] = $exploded_image[2];
            }

            ModelsCategory::where('id',$this->editId)->update($data);

            $this->resetData();
            $this->emit('updated');

        } else {

            $validatedData = $this->validate([
                'name' => 'required|max:255|unique:categories,name',
                'status' => 'required',
                'image' => 'required|image',
            ]);


            $this->slug = Str::slug($this->name);
            $image =   $this->image->store('public/media');
            $exploded_image =explode('/',$image);

            ModelsCategory::create([
                'name' => $this->name,
                'slug' => $this->slug,
                'image' => $exploded_image[2],
            ]);
            $this->resetData();
            $this->emit('stored');

        }





    }

    public function status($value)
    {
        $category = ModelsCategory::where('id',$value)->first() ;
        if ($category->status == 1) {
        ModelsCategory::where('id',$value)->update([
            'status' => 0,
        ]);
        } else {
        ModelsCategory::where('id',$value)->update([
            'status' => 1,
        ]);
        }


    }

    public function edit($id)
    {
        $data = ModelsCategory::find($id);
        $this->editId = $id;
        $this->image = null;
        $this->name = $data->name;
        $this->status = $data->status;

    }

    public function updated($value)
    {
        $this->validateOnly($value);
    }

    public function resetData()
    {
        $this->name = null;
        $this->slug = null;
        $this->image = null;
        $this->status = 1;
        $this->editId = null ;
        $this->data = null;
    }


    public function hydrate()
    {
        $this->emit('datatable') ;
    }

    public function changeEvent($value)
    {
        $this->status = $value ;
    }


    public function render()
    {
        $this->categories = ModelsCategory::get();
        return view('livewire.category')->extends('admin.layouts.master')->section('content');
    }
}
