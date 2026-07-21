<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class postController extends Controller
{
    public function createPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => ['required', 'max:100'],
            'body' => ['required', 'max:500']
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);

        return redirect('/');
    }
}
