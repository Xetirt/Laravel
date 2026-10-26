<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::with('user')->latest()->get();
        return view('ideas.index', compact('ideas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $request->user()->ideas()->create($validated);

        return redirect()->route('ideas.index')->with('success', 'Idea creada con éxito.');
    }

    public function show(Idea $idea)
    {
        $idea->load(['user', 'comments.user']);
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        if ($idea->user_id !== Auth::id()) {
            abort(403);
        }

        return view('ideas.edit', compact('idea'));
    }

    public function update(Request $request, Idea $idea)
    {
        if ($idea->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea)->with('success', 'Idea actualizada.');
    }

    public function destroy(Idea $idea)
    {
        if ($idea->user_id !== Auth::id()) {
            abort(403);
        }

        $idea->delete();

        return redirect()->route('ideas.index')->with('success', 'Idea eliminada.');
    }
}