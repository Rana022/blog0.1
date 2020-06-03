<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{
    protected $fillable = [
        'blog_name', 'welcome_speech', 'slogan', 'address', 'contact', 'email', 'facebook', 'linkedin', 'twitter'
    ];
}
