<?php

namespace App\Http\Livewire;

use App\Models\admin\ImageUpload;
use App\Models\Banner as ModelsBanner;
use App\Models\Category as ModelsCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
class Banner extends Component
{
    use WithFileUploads;
    public $name , $image ,$slug ,$status =1 ,$categories ,$editId ,$data,$option_id=null ,$type_id = null ,$options = null ,$description,$title;

    protected $listeners = [
        'resetData',
        'changeOption'
    ];

    public function mount()
    {

    }

    protected $rules = [
        'name' => 'required|max:255|string',
        'status' => 'required',
        'type_id' => 'required',
    ];


    public function save()
    {
        if ($this->editId != null) {
            $validatedData = $this->validate([

                'status' => 'required',
                'image' => 'nullable|image',
            ]);

            $data = [
                'option_id' => $this->option_id,
                'name' => $this->name,
                'description' => $this->description,
                'title' => $this->title,
                'type_id' => $this->type_id,
                'status' => $this->status,
            ];

            if ($this->image != NULL) {
                $image =   $this->image->store('public/media');
                $exploded_image =explode('/',$image);
                $data['image'] = $exploded_image[2];
            }
            ModelsBanner::where('id',$this->editId)->update($data);
            $this->resetData();
            $this->emit('updated');
        } else {
            $validatedData = $this->validate([
                'status' => 'required',
                'image' => 'required|image',
            ]);
            $image =   $this->image->store('public/media');
            $exploded_image =explode('/',$image);
            ModelsBanner::create([
                'type_id' => $this->type_id,
                'option_id' => $this->option_id,
                'image' => $exploded_image[2],
                'status' => $this->status,
                'title' => $this->title,
                'name' => $this->name,
                'description' => $this->description,
                'type_id' => $this->type_id,
                'status' => $this->status,
            ]);
            $this->resetData();
            $this->emit('stored');
        }
    }

    public function status($value)
    {
        $banner = ModelsBanner::where('id',$value)->first() ;
        if ($banner->status == 1) {
        ModelsBanner::where('id',$value)->update([
            'status' => 0,
        ]);
        } else {
        ModelsBanner::where('id',$value)->update([
            'status' => 1,
        ]);
        }


    }


    public function delete($id)
    {
        $data = ModelsBanner::where('id',$id)->delete();
        $this->emit('deleted');
    }

    public function edit($id)
    {
        $data = ModelsBanner::find($id);
        $this->editId = $id;
        $this->image = null;
        $this->name = $data->name;
        $this->title = $data->title;
        $this->description = $data->description;
        $this->changeType($data->type_id);
        $this->option_id = $data->option_id;
        $this->status = $data->status;
    }

    public function updated($value)
    {
        $this->validateOnly($value);
    }

    public function resetData()
    {
        $this->name = null;
        $this->options = null;
        $this->type_id = null;
        $this->option_id = null;
        $this->slug = null;
        $this->image = null;
        $this->status = 1;
        $this->editId = null ;
        $this->data = null;
    }


    public function hydrate()
    {
        $this->emit('select') ;
    }

    public function changeEvent($value)
    {
        $this->status = $value ;
    }

    public function changeType($value)
    {
        $this->type_id = $value ;
        if ($this->type_id == 0) {
           $this->options = null;
        }
        if ($this->type_id == 1) {
           $this->options = ModelsCategory::where('status',1)->get();
        }
        if ($this->type_id == 2) {
           $this->options = Product::where('status',1)->get();
        }
    }

    public function changeOption($value)
    {

        $this->option_id = $value ;

    }

    public function render()
    {
        $banners = ModelsBanner::get();
        return view('livewire.banner',compact('banners'))->extends('admin.layouts.master')->section('content');
    }
}
