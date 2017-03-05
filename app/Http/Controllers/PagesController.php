<?php

namespace App\Http\Controllers;

use App\Page;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $pages = Page::latest();

        if ($month = request('month')) {
            $pages->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = request('year')) {
            $pages->whereYear('created_at', $year);
        }

        $pages = $pages->isPublished()->get();

        return view('pages.index', compact('pages'));
    }

    public function indexAdmin()
    {
        $pages = Page::paginate(10);

        return view('backend.pages.index', compact('pages'));
    }


    /**
     * Get the all pages that have the specific tag
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tagged(Tag $tag)
    {
        $pages = $tag->pages()->latest()->isPublished()->get();
        return view('pages.index', compact('pages'));
    }

    /**
     * GET /pages/id
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }

    /**
     * GET /pages/create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * POST /pages
     */
    public function store()
    {

        $this->validate(request(), [
            'title' => 'required|max:20',
            'body' => 'required',
        ]);

        Page::create([
            'title' => request('title'),
            'body' => request('body'),
            'uri' => request('uri'),
            'user_id' => auth()->id(),
        ]);

        return redirect('/');
    }

    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        str_replace(" ", "-",$request->get('uri'));
        $page->update($request->all());

        return redirect()->route('adminPagesIndex');
    }
}
