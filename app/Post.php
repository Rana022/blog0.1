<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body',
    ];
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status',1);
    }
    public function scopePublished($query)
    {
        return $query->where('is_approved',1);
    }
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable')->whereNull('parent_id');
    }
    public function searchableAs()
    {
        return 'title';
    }
}