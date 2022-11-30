<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function getRouteKeyName()
    { //the key we use to find our route of single posts in Route-Model binding
        return  'slug';

    }
    public function catagory(){
        return $this->belongsTo(Catagory::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }


}
