<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller {
    public function index($id) {
        return Comment::where('post_id', $id)->get();
    }
    public function store(Request $request) {
        $comment = Comment::create([
            'post_id' => $request->input('post_id'),
            'text' => $request->input('text'),
        ]);

        $req = \Http::post("http://127.0.0.1:8000/api/posts/{$comment->post_id}/comments", [
            'text' => $comment->text,
        ]);

        if ($req->failed()) {
            echo 'request failed';
        }

        return $comment;
    }
}