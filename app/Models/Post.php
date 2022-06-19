<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /* RELACIÓN 1 A MUCHOS INVERSA (PERTENECE A:) */

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    /* RELACIÓN MUCHOS A MUCHOS */

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    /* RELACIÓN 1:1 POLIMORFICA */
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
