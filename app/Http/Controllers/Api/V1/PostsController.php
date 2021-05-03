<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::get();
        return view('api.posts.index',['posts' => $posts]);
    }

    public function store(Request $request)
    {
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

        return $posts;
    }

    public function show($id)
    {
        $posts = Posts::findOrFail($id);
        return $posts;
    }

    public function update(Request $request, $id)
    {
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

        return $posts;
    }

    public function destroy($id)
    {
        $posts = Posts::findOrFail($id)->delete();
        return $posts;
    }
}
