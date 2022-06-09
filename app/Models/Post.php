<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $quardet = false;
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'tags_ids',
        'main_image',
        'preview_image',
    ];

    public function tags()
    {
    	return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
