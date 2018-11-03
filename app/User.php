<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()

    {
        return $this->hasMany(Post::class);
    }

    public function publishAPost()
    {
        $post = new Post;
        $post->title = request('title');
        $post->body = request('content');
        $post->user_id = auth()->id();
        //$post->user_id = auth()->user()->id;
        $post->save();
    }


    // Works same as publishApost()
    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }
}
