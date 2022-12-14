<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select('id','name','slug','status')->get();
        return view('backend.category.manage',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'status' => 'required',
        ]);

        try {

            Category::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ','-',$request->name)),
                'status' => $request->status,
            ]);
            return redirect()->back()->with(['message'=>'category Create Success','type'=>'success']);
        }catch (Exception $exception)
        {
            return redirect()->back()->with(['message'=>$exception->getMessage(),'type'=>'danger']);
        }
    }

    /**
     * Display the specified resource.
     *
     *
     */
    public function show($id)
    {

        $category = Category::find($id);
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(Request $request, $id='')
    {
        $request->validate([
            'name' => 'required|unique:categories,id,'.$id,
            'status' => 'required',
        ]);

        try {
            $category = Category::find($id);
            $category->user_id = Auth::id();
            $category->name = $request->name;
            $category->slug = strtolower(str_replace(' ','-',$request->name));
            $category->status = $request->status;
            $category->save();

            return redirect()->back()->with(['message'=>'category Update Success','type'=>'success']);
        }catch (Exception $exception)
        {
            return redirect()->back()->with(['message'=>$exception->getMessage(),'type'=>'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with(['message'=>'category delete success','type'=>'success']);
    }
}
