<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CuitController extends Controller
{
    public function index(): View
    {
        $posts = Auth::user()->posts()->with('user')->orderBy('created_at', 'desc')->get();
        return view('home', [
            'posts' => $posts
        ]);
    }

    public function post(Request $request): RedirectResponse {
        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content 
        ]);

        return redirect('/')->with('success', 'Your post has been saved!');
    }
}
