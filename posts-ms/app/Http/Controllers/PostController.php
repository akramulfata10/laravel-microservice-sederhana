<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function index() {
        // foreach ($posts as $post) {
        //     $post->comments = \Http::get("http://127.0.0.1:8001/api/posts/{$post->id}/comments")->json();
        // }
        return Post::all();
    }
    public function store(Request $request) {
        return Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
    }

    public function comment(Request $request, $id) {
        $post = post::find($id);

        $comments = $post->comments;

        array_push($comments, ['text' => $request->input('text')]);

        $post->comments = $comments;

        $post->save();

    }
}