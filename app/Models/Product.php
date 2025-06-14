<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','quantity','price','type_id','image_path'];

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
