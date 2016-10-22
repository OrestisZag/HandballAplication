<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    private $model;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $users = User::where(function ($query) use ($request) {
            if ($term = $request->get('term')) {
                $query->orwhere('name', 'like', '%' .$term. '%');
                $query->orwhere('email', 'like', '%' .$term. '%');
                $query->orwhere('role', 'like', '%' .$term. '%');
            }
        })->orderBy('name', 'asc')->paginate(10);

        return view('user.index')->with('users', $users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = $this->model->find($id);

        return view('user.show')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $oldUser = $this->model->find($id);
        //$oldUser->update($request->except(['_token','_method']));
        $oldUser->name = $request->name;
        $oldUser->email = $request->email;
        $oldUser->role = $request->role;
        $oldUser->password = bcrypt($request->password);
        $oldUser->save();

        return redirect()->route('user.show', $this->model->find($id));
    }

    public function create()
    {
        return view('user.create');
    }

    public function edit($id)
    {
        $user = $this->model->find($id);

        return view('user.edit')->withUser($user);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);


        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect()->route('user.index');
    }

    public function destroy($id) {
        $user =  $this->model->find($id);
        $user->delete();

        return redirect()->route('user.index');
    }
}
