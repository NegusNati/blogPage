<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;

    // public function getRouteKeyName()
    // { //the key we use to find our route of single posts in Route-Model binding
    //     return  'slug';

    // }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
