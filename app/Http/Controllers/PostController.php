<?php

namespace App\Http\Controllers;

use App\Post;

use App\Comment;

use App\User;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Mail\Welcome;

class PostController extends Controller
{

    // Only the auth have login can add a post.
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }


    public function index(User $user)
    {
        // $posts = Post::all(); return column not work.
    	// $posts = Post::latest();

     // Move this into post model.
     //    if ($month = request('month'))
     //    {
     //        $posts->whereMonth('created_at', Carbon::parse($month)->month);
     //    }

     //    if ($year = request('year'))
     //    {
     //        $posts->whereYear('created_at', Carbon::parse($year)->year);
     //    }

     //    $posts = $posts->get();

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        // $this->authorize('read-post', $post);
        // return $posts;
   
        //$archives = Post::archives();
        //move this in AppServiceProvider.

    	return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store(User $user)
    {

        // dd(request()->all());
        // dd(request('title'));
        // dd(request('content'));

        request()->validate([
            'title' => 'bail|required|unique:posts|max:255',
            'content' => 'required',
        ]);

        //$user->publishAPost();
        auth()->user()->publish(
            new Post(['title' => request('title'),
                'body' => request('content')])
        );

        return redirect()->home()->with('notice' , app('notification.forPost')->printNotice());

    }

    public function show($id)
    {
        $post = Post::find(request('id'));

        //dd($post->comments);

        return view('posts.show', ['post' => $post]);
    }

    // Test vue.
    public function view()
    {
        return view('posts.view');
    }

}
