<?php

namespace App\Http\Controllers;

use App\Page;
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

        // this can be done with queryScopes..lesson 20
        $pages = Page::latest();

        if ($month = request('month')) {
            $pages->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = request('year')) {
            $pages->whereYear('created_at', $year);
        }

        $pages = $pages->get();
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

    /**
     * GET pages/id/edit
     * @param $id
     */
    public function edit($id)
    {

    }

    /**
     * PATCH /pages/id
     * @param $id
     */
    public function update($id)
    {

    }

    /**
     * DELETE /pages/id
     * @param $id
     */
    public function destroy($id)
    {

    }


}
