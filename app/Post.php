<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Tag;
class Post extends Model
{
    protected  $fillable =[
        'title',
        'description',
        'image',
        'category_id'
    ];
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    //check if Value exist in Array
    public function hastag($tagId)
    {
        return in_array($tagId,$this->tags->pluck('id')->toArray());
    }
}
