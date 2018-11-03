<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\Comment;

class Post extends Model
{

    protected $fillable = ['title', 'body'];

    public function comments()
    {

    	return $this->hasMany(Comment::class);

    }

    public function addComment($body)
    {

        // dd($this);

       Comment::create([
        	'body' => $body,
        	'post_id' => $this->id,
            'user_id' => $this->user_id
        ]);
        // $comment = new Comment;
        // dd($comment->post());

    	// $this->comments()->create([
     //        'post_id' => $this->id,
     //        'user_id' => $this->user_id,
     //        'body' => $body
     //    ]);
    }

    public function user() // $comment->post->user
    {

    	 return $this->belongsTo(User::class);

    }

    public function scopeFilter($query, $filters)
    {
        if (!isset($filters['month'])) {
            return $query->latest();
        }

        if ($month = $filters['month'])
        {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year'])
        {
            $query->whereYear('created_at', Carbon::parse($year)->year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get();
    }

}
