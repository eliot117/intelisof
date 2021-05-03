<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',['posts' => $posts]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'     => 'required|max:255',
            'image_url' => 'required|image',
            'content'   => 'required'
        ]);

        $fileNameWithTheExtension = request('image_url')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        $extension = request('image_url')->getClientOriginalExtension();
        $newFileName = $fileName . '_' . time() . '.' . $extension;
        $path = request('image_url')->storeAs('public/notice_images', $newFileName);

        $user = auth()->user();

        $posts = new Posts();
        $posts->title     = request('title');
        $posts->content   = request('content');
        $posts->image_url = $newFileName;
        $posts->user_id   = $user->id;
        $posts->save();

        return redirect('posts')->withSuccess('Noticia Creada Correctamente');
    }

    public function show($id)
    {
        $posts = Post::findOrFail($id);
        return view('admin.posts.show', ['posts' => $posts]);
    }

    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('admin.posts.edit',['posts' => $posts]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'     => 'required|max:255',
            'image_url' => 'required|image',
            'content'   => 'required'
        ]);

        $fileNameWithTheExtension = request('image_url')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        $extension = request('image_url')->getClientOriginalExtension();
        $newFileName = $fileName . '_' . time() . '.' . $extension;
        $path = request('image_url')->storeAs('public/notice_images', $newFileName);

        $posts = Posts::findOrFail($id);

        $posts->title     = request('title');
        $posts->content   = request('content');
        $posts->image_url = $newFileName;

        $posts->save();

        return redirect('posts')->withToastInfo('Noticia Actualizada Correctamente');
    }

    public function destroy($id)
    {
        $posts = Post::findOrFail($id);
        return redirect()->route('posts.index');
    }
}
