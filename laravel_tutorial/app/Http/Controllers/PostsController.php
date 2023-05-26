<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
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
            'posts' => Post::orderBy('updated_at', 'desc')->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {
        // $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'excerpt' => 'required',
        //     'body' => 'required',
        //     'image_path' => ['required', 'mimes:jpg,png,jped', 'max:5048'],
        //     'min_to_read' => 'min:0|max:60'
        // ]);

        $request->validated();
        // $post = new Post();
        // $post->title = $request->title;
        // $post->excerpt = $request->excerpt;
        // $post->body = $request->body;
        // $post->image_path = 'temporary';
        // $post->is_published = $request->is_published === 'on';
        // $post->min_to_read = $request->min_to_read;
        // $post->save();

        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $this->storeImage($request),
            'is_published' => $request->is_published === 'on',
            'min_to_read' => $request->min_to_read
        ]);

        return redirect(route('blog.index'));
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
        return view('blog.edit', [
            'post' => Post::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, string $id)
    {
        // $request->validate([
        //     'title' => 'required|max:255|unique:posts,title' . $id,
        //     'excerpt' => 'required',
        //     'body' => 'required',
        //     'image_path' => ['mimes:jpg,png,jped', 'max:5048'],
        //     'min_to_read' => 'min:0|max:60'
        // ]);

        $request->validated();
        // POST::where('id', $id)->update([
        //     'title' => $request->title,
        //     'excerpt' => $request->excerpt,
        //     'body' => $request->body,
        //     'image_path' => $request->image,
        //     'is_published' => $request->is_published === 'on',
        //     'min_to_read' => $request->min_to_read
        // ]);

        POST::where('id', $id)->update($request->except([
            '_token', '_method'
        ]));

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);

        return redirect(route('blog.index'))->with('message', 'Post had been deleted');
    }

    private function storeImage($request){
        $newImageName = uniqid() . '-' . $request->title . '.' .
        $request->image->extension();

        return $request->image->move(public_path('images'), $newImageName);
    }
}
