<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'category_id',
        'photo1',
        'photo2',
        'photo3',
        'views',
        'is_main',
        'user_id',
        'content_en',
        'content_ar',
    ];

   public function Category()  {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function user()  {
        return $this->hasOne(User::class,'id','user_id');
    }
}
