<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{

    protected $fillable = [
        'comment_id',
        'author',
        'email',
        'body',
        'is_active',
        'photo'
    ];

    use HasFactory;

    public function comment(){
        return $this->belongsTo('App\Models\Comment');
    }

}
