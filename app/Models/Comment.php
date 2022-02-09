<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'post_id',
        'author',
        'email',
        'body',
        'is_active',
        'photo'
    ];

    use HasFactory;

    public function post(){
        return $this->belongsTo('App\Models\Post');
    }

    public function replies(){
        return $this->hasMany('App\Models\CommentReply');
    }

}
