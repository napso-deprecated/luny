<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Page $page)
    {
        $this->validate(request(), [
            'body' => 'required|min:2',
        ]);

        $userId = auth()->id();

        $page->addComment(request('body'), $userId);
        return back();
    }
}
