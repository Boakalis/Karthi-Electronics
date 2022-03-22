<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SubCategory as ModelsSubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;


class SubCategory extends Component
{
    use WithFileUploads;
    public $name , $image ,$slug ,$status =1 ,$categories ,$editId ,$data ,$subcategories ,$category_id;

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
                'name' => 'required|max:255|unique:sub_categories,name,'.$this->editId,
                'status' => 'required',
                'category_id' => 'required',
                'image' => 'nullable|image',
            ]);

            $data = [
                'name' => $this->name,
                'slug' => Str::slug($this->name) ,
                'status' => $this->status,
                'category_id' => $this->category_id
            ];

            if ($this->image != NULL) {
                $image =   $this->image->store('public/media');
                $data['exploded_image'] =explode('/',$image);
            }

            ModelsSubCategory::where('id',$this->editId)->update($data);

            $this->resetData();
            $this->emit('updated');

        } else {

            $validatedData = $this->validate([
                'name' => 'required|max:255|unique:sub_categories,name',
                'status' => 'required',
                'image' => 'required|image',
                'category_id' => 'required',
            ]);

            $this->slug = Str::slug($this->name);
            $image =   $this->image->store('public/media');
            $exploded_image =explode('/',$image);

            ModelsSubCategory::create([
                'name' => $this->name,
                'slug' => $this->slug,
                'category_id' => $this->category_id,
                'image' => $exploded_image[2],
            ]);
            $this->resetData();
            $this->emit('stored');

        }





    }

    public function status($value)
    {
        $category = ModelsSubCategory::where('id',$value)->first() ;
        if ($category->status == 1) {
        ModelsSubCategory::where('id',$value)->update([
            'status' => 0,
        ]);
        } else {
            ModelsSubCategory::where('id',$value)->update([
            'status' => 1,
        ]);
        }


    }

    public function edit($id)
    {
        $data = ModelsSubCategory::find($id);
        $this->editId = $id;
        $this->category_id = $data->category_id;
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
        $this->category_id = null ;
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

    public function changeCategory($value)
    {
        $this->category_id = $value ;
    }



    public function render()
    {
        $this->categories = Category::get();
        $this->subcategories = ModelsSubCategory::get();
        return view('livewire.sub-category')->extends('admin.layouts.master')->section('content');
    }
}
