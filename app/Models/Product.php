<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    // public function unique()
    // {
    //     $d=date ("d");
    //     $m=date ("m");
    //     $y=date ("Y");
    //     $t=time();
    //     $dmt=$d+$m+$y+$t;
    //     $ran= rand(0,10000000);
    //     $dmtran= $dmt+$ran;
    //     $un=  uniqid();
    //     $dmtun = $un.$dmt;
    //  return   $mdun = md5($dmtun);
    // }

    public function dealer() {
        // return $this->belongsTo(User::class,'dealer_id','id');
        return $this->belongsTo(User::class);
    }

    public function subcategory() {
        // return $this->belongsTo(User::class,'dealer_id','id');
        return $this->belongsTo(SubCategory::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }


}
