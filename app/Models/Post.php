<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "publishandNot","title","content","category_id","image","slug","description","user_id"
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id','id');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }

}
