<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('backend.post.manage', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::select('id','name','slug','status')->get();
        return view('backend.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'category' => 'required',
            'title' => 'required|unique:posts',
            'image' => 'required|image',
            'description' => 'required',
            'status' => 'required',
        ]);


        try {
            $photo = $request->file('image');
            $file_name = date('dmymhis.') . $photo->getClientOriginalExtension();

            $post = Post::create([
                'user_id' => Auth::id(),
                'category_id' => $request->category,
                'title' => $request->title,
                'slug' => strtolower(str_replace(' ', '-', $request->title)),
                'description' => $request->description,
                'image' => $file_name,
                'status' => array_rand(['active' => 'active', 'inactive' => 'inactive'], 1),
            ]);
            if ($post) {
                $photo->move('posts', $file_name);
            }

            return redirect()->back()->with(['message' => 'Post Add Success', 'type' => 'success']);
        } catch (Exception $exception) {
            return redirect()->back()->with(['message' => $exception->getMessage(), 'type' => 'danger']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with(['message' => 'Post delete success', 'type' => 'success']);
    }
}
