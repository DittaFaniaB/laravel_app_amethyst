<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //for connect to the model Post.php
use DB;

 /*      NOTES

    sintax for create controller all of the methods bellow:
        php artisan make:controller <namaFile> --resource
    syntax for create controller plus migrate
        php artisan make:controller <namaFile> -m
    index
    list method and the function
    1. create
    method for when we click at the browser (/post/create) will show the create-form
    2. store
    when we click submit, the value willbe stored in this function
    and this is also to connect db similar to model
    3. edit
    4. update, the value from edit form will be submitted to this function
    5. destroy 
    for delete post
    6. show
    to show the data in single post

*/

class PostsController extends Controller
{

       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth'); will not allow to click btn blog in navbar
        //add exception so we can still see the post even we're not log in
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //      USING ELOQUENT
        //return Post::all(); 
        //for returning all of the data from db table posts
        //we pass it through a variable called posts
        //$posts = Post::all();
        //then we add it to the view using 'with
        //return view('posts.index')->with('posts', $posts);
        //also we can return using syntax where to show the post, but still in array
        //return $posts = Post::where('title','Post Two')->get();

        //we can also show it in order, the syntax must add ->get(); //asc=ascending, desc=descending
        //$posts = Post::orderBy('title', 'desc')->get();

        //to limit how many data or posts will be shown, use take(number)
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();

        /*  Pagination
            to add page and limit the max posts on one page
            syntax : 
            $posts = Post::orderBy('title', 'desc')->paginate(maxNumber);
            then we add some line in the view. the syntax is
            {{$posts->links()}}
        */
        // $posts = Post::orderBy('title', 'desc')->paginate(10);
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);//then in the view we call the var


        /*      USING SQL QUERY
        we can use basic sql query.
        1. add / bring in DB library by type "use DB;" 
        2. syntax in index function: */
        //$posts = DB::select('SELECT * FROM posts');
        //return view('posts.index')->with('posts', $posts);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        //return 'success!'; 
        //to  check if we success to submit form
        //      CREATE Post IN DATABASE
        $post = new Post;
        //take the value from variable $request 
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // user have their own post using id
        $post->user_id = auth()->user()->id;
        //auth()->user()->id; is to get the currently login user's id
        
        //we must add save, just like what we've done in php artisan tinker
        $post->save();

        //then we redirect the page/view in the browser
        //we call the session in the file messages.blade.php using 
        //with('<nameOfSession>', 'The messages we want to show');
        return redirect('/posts')->with('success', 'Post Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Post::find($id); 
        //show all the coloumn+value in the posts table in db
        //then we want to pass it using var called $post
        $post = Post::find($id);
        //then we return view
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //check the correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        

        //then we return view
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        //return 'success!'; to  check if we success to submit form
        //      FIND Post IN DATABASE
        $post = Post::find($id);
        //take the value from variable $request 
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        //we must add save, just like what we've done in php artisan tinker
        $post->save();

        //then we redirect the page/view in the browser
        //we call the session in the file messages.blade.php using 
        //with('<nameOfSession>', 'The messages we want to show');
        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //check the correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted');
    }
}
