<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $fillable = ['title'];
    protected $quardet = false;

    public function posts()
    {
    	return $this->hasMany(Post::class, 'id', 'category_id');
    }

}
