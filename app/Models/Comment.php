<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'comment_id';

    protected $fillable = ['project_id','user_id','like','dislike','is_reply','reply_to','comment'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'reply_to', 'comment_id');
    }
}
