<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function home()
    {
        $posts = Post::with('categories')->latest()->take(4)->get();
        return view('welcome', ['posts' => $posts]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('/posts/post_list', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('/posts/post_create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
            'image' => 'image|max:5120',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = Auth::user()->id;
        $image = $request->file('image');
        $path = $image->store('assets/images', 'public');
        $post->image = $path;
        $post->save();

        $post->categories()->sync($validated['categories'] ?? []);


        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $id = request('id');
        $post = Post::findOrFail($id);
        $post->load('categories');
        return view('/posts/post_details', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        $categories = Category::all();
        $post->load('categories');
        return view('/posts/post_edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        // dd($request->all());
        $validated = $request->validate([
            'title' => 'nullable|min:3',
            'content' => 'nullable',
            'image' => 'nullable|image|max:2048',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id'
        ]);
        if (!empty($post->title))
            $post->title = $validated['title'];
        if (!empty($post->content))
            $post->content = $validated['content'];

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('image')->store('assets/images', 'public');
        }
        $post->update();
        if ($request->has('categories'))
            $post->categories()->sync($validated['categories'] ?? []);

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        $post = Post::findOrFail($id);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
        return redirect('/posts');
    }
}
