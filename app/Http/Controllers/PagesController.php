<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    /**
     * GET /pages/id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $page = "temp";
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

        Page::create([
            'title' => request('title'),
            'body' => request('body'),
            'uri' => request('uri'),
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
