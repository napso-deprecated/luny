<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // we cannot use the roles if we want to paginate because the roles variable is available for all the
        // views from the AppServiceProvider so we will use different name

        $rolesPaginated = Role::latest()->paginate(10);

        return view('backend.roles.index', compact('rolesPaginated'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        return view('backend.roles.editcreate', compact('role'));
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
        ]);

        // we generate a password for the user, and they should do "forgot password" to reset it.
        Role::create([
            'name' => request('name'),
        ]);

        return redirect('/admin/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Role $role)
    {
        return view('backend.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $role
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Role $role)
    {
        if ($role->name == 'super admin') {
            return redirect('admin/roles')->withErrors(['error' => 'super admin role cannot be edited.']);
        }
        return view('backend.roles.editcreate', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Role $role)
    {
        $this->validate(request(), [
            'name' => 'required|max:15',
        ]);

        $role->update($request->all());
        return redirect('/admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('/admin/roles');
    }

    public function confirm(Role $role)
    {
        return view('backend.roles.confirm', compact('role'));
    }
}
