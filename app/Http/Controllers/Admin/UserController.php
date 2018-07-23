<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('admin.users.index', compact('users'));
  }

  public function create()
  {
    return view('admin.users.create');
  }

  public function store(UserRequest $request)
  {
    $formData = $request->all();

    $request->validated();

    $formData['password'] = bcrypt($formData['password']);

    $user = new User();
    $user->create($formData);

    flash('User created successfully')->success();
    return redirect(route('users.index'));
  }

  public function edit(User $user)
  {
    return view('admin.users.edit', compact('user'));
  }

  public function update(UserRequest $request, $id)
  {
    $formData = $request->all();

    $request->validated();

    $user = User::findOrFail($id);
    $user->update($formData);

    flash('User successfully updated')->success();
    return redirect(route('users.edit', ['id' => $id]));
  }

  public function delete($id)
  {
    $user = User::findOrFail($id);

    try {
      $user->delete();
      flash('User removed successfully')->success();
    } catch (Exception $e) {
      flash('Record can not be deleted because it has related records')->error();
    }

    return redirect(route('users.index'));
  }
}
