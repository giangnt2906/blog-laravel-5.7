<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Comment;

class Post extends Model
{
    // Comment system
    use SoftDeletes;

    // Tag system
    use \Conner\Tagging\Taggable;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'tag_name'];

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments()
    {
        // return $this->hasMany(Comment::class)->whereNull('parent_id');
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    // Table name
    protected $table = 'posts';
    // Primary ket
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
