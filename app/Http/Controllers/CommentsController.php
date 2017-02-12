<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Page $page)
    {
        $this->validate(request(), [
            'body' => 'required|min:2',
        ]);

        $page->addComment(request('body'));
        return back();
    }
}
