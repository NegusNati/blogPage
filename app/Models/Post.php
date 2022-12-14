<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $with = ['catagory', 'author'];

    public function scopeFilter($query, array $filters)
    {

        // if ($filters['search'] ?? false) {
        //     $query
        //         ->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // } another way down

        // $query->when($filters['search'] ?? false, function ($query, $search) {
        //     $query
        //         ->where('title', 'like', '%' . $search . '%')
        //         ->orWhere('body', 'like', '%' . $search . '%');
        // }); with arrow function down

        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where(fn ($query) =>
            $query
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')));

        $query->when($filters['catagory'] ?? false, fn ($query, $catagory) =>
        $query->whereHas('catagory', fn ($query) => $query->where('slug', $catagory)));

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query->whereHas('author', fn ($query) => $query->where('userName', $author)));






        // $query
        //     ->whereExists( fn($query) =>
        //         $query->from('catagories')
        //         ->whereColumn('catagories.id','posts.catagory_id')
        //         ->where('catagories.slug',$catagory))

        // );
    }

    public function getRouteKeyName()
    { //the key we use to find our route of single posts in Route-Model binding
        return  'slug';
    }
    public function catagory()
    {
        return $this->belongsTo(Catagory::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
