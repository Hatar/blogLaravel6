<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
class PostController extends Controller
{

    public function __construct(){
        $this->middleware('checkCategory')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create',[
            'categories'=>Category::all(),
            'tags'=>Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $post = Post::create([
            'title'             =>$request->title,
            'description'       =>$request->description,
            'image'             =>$request->image->store('images','public'),
            'category_id'       =>$request->categoryID
        ]);
        if($request->tags){
            $post->tags()->attach($request->tags);
        }
        session()->flash('success','Post Saved');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        dd($post);
        return view('posts.create',[
            'post'=>$post,
            'categories'=>Category::all(),
            'tags'=>Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,Post $post)
    {
        $data = $request->only(['title','description']);
        if($request->hasFile('image')){
            $image = $request->image->store('images','public');
            Storage::disk('public')->delete($post->image);
            $data['image'] = $image;
        }
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        $post->update($data);
        session()->flash('success','Post is Updated !!');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        if($post->trashed()){
            Storage::disk('public')->delete($post->image);
            $post->forceDelete();
            session()->flash('success','Post Deleted  !!!');

        }else {
            $post->delete();
            session()->flash('success','Post Trashed  !!!');
        }
        return redirect(route('posts.index'));
    }

    public function getTrashed(){
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->withPosts($trashed);
    }

    public function restore($id)
    {
        Post::withTrashed()->where('id',$id)->restore();
        session()->flash('success','Posted is Restore');
        return redirect(route('posts.index'));
    }
}
