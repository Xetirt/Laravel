<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Idea $idea)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $idea->comments()->create([
            'content' => $validated['content'],
            'user_id' => $request->user()->id,
        ]);

        return back()->with('success', 'Comentario publicado.');
    }
}