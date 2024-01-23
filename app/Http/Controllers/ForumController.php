<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $forums = Forum::all();
        $categories = Category::withCount('forums')->get();
        return view('forum.index', compact('forums', 'categories'));
    }

    public function forum_1()
    {
        $forums = Forum::where('category_id', 1)->paginate(10);
        $category = Category::find(1);
        return view('forum.forum_1', compact('forums', 'category'));
    }
    public function forum_2()
    {
        $forums = Forum::where('category_id', 2)->paginate(10);
        $category = Category::find(2);
        return view('forum.forum_2', compact('forums', 'category'));
    }
    public function forum_3()
    {
        $forums = Forum::where('category_id', 3)->paginate(10);
        $category = Category::find(3);
        return view('forum.forum_3', compact('forums', 'category'));
    }
    public function forum_4()
    {
        $forums = Forum::where('category_id', 4)->paginate(10);
        $category = Category::find(4);
        return view('forum.forum_4', compact('forums', 'category'));
    }
    public function forum_5()
    {
        $forums = Forum::where('category_id', 5)->paginate(10);
        $category = Category::find(5);
        return view('forum.forum_5', compact('forums', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = Auth::user();
        $categories = Category::all();
        return view('forum.create', compact('user', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titre' => 'required',
            'titre_en' => 'required',
            'message' => 'required',
            'message_en' => 'required',
            'category_id' => 'required'
        ]);
        $user = Auth::user();

        $forum = Forum::create([
            'titre' => $request->titre,
            'titre_en' => $request->titre_en,
            'message' => $request->message,
            'message_en' => $request->message_en,
            'user_id' => $user->id,
            'category_id' => $request->category_id
        ]);
        //return $forum;
        return redirect()->route('forum.index')->with('success', 'Forum créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        //
        return view('forum.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        //
        $user = Auth::user();
        $categories = Category::all();
        return view('forum.edit', compact('forum', 'categories', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
    {
        //
        $request->validate([
            'titre' => 'required',
            'titre_en' => 'required',
            'message' => 'required',
            'message_en' => 'required',
            'category_id' => 'required'
        ]);

        $forum->update([
            'titre' => $request->titre,
            'titre_en' => $request->titre_en,
            'message' => $request->message,
            'message_en' => $request->message_en,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('forum.index')->with('success', 'Forum modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
        //
        $forum->delete();
        return redirect()->route('forum.index')->with('success', 'Forum supprimé avec succès');
    }
}
