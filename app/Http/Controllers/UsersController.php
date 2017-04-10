<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('backend.users.editcreate', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:20',
            'body' => 'email',
        ]);

        // we generate a password for the user, and they should do "forgot password" to reset it.
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(uniqid()),
        ]);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(User $user)
    {
        return view('backend.users.editcreate', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, User $user)
    {
        // get the roles in the request and also update them
        $this->validate(request(), [
            'name' => 'required|max:20',
            'body' => 'email',
        ]);

        $user->update($request->all());

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/users');
    }


    public function confirm($id)
    {

        $user = User::findOrFail($id);

        if (intval($id) === auth()->user()->id) {
            return redirect()->back()->withErrors([
                'error' => 'You cannot delete yourself'
            ]);
        }
        return view('backend.users.confirm', compact('user'));
    }
}
