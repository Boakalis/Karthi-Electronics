<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class,'type_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'type_id');
    }

}
