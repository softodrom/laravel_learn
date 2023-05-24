<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = DB::select('SELECT * FROM posts WHERE id = :id', ['id' => 1]);
        // $posts = DB::insert('INSERT INTO posts (title, excerpt, body, image_path, 
        // is_published, min_to_read) VALUES(?, ?, ?, ?, ?, ?)', [
        //     'Test', 'test', 'test', 'test', true, 1
        // ]);
        // $posts = DB::update('UPDATE posts set body = ? where id = ?', [
        //     'Body 2', 53
        // ]);
        // $posts = DB::delete('DELETE FROM posts where id = ?', [99]);
        // $posts = DB::table('posts')
        //     ->orderBy('id', 'desc')
        //     ->where('id', '>', 50)
        //     ->select('id', 'title', 'body')
        //     ->get();

        // $posts = DB::table('posts')->get();
        // $posts = DB::table('posts')->find(1);

        // dd($posts);

        // return view('blog.index')->with('posts', $posts);
        // return view('blog.index', compact('posts'));

        // return view('blog.index', [
            // 'posts' => DB::table('posts')->get()
        // ]);
        // $posts = Post::orderBy('id', 'desc')->take(10)->get();
        // $posts = Post::where('min_to_read', 2)->get();

        // dd($posts);

        // Post::chunk(25, function ($posts){
        //     foreach($posts as $post){
        //         echo $post->title . '<br>';
        //     };
        // });

        // $posts = Post::get()->count();
        // $posts = Post::sum('min_to_read');
        // $posts = Post::avg('min_to_read');

        // dd($posts);

        return view('blog.index', [
            'posts' => Post::orderBy('updated_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('blog.show', [
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
