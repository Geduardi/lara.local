<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', [ 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $create = User::create($data);

        if ($create){
            return redirect()->route('admin.user.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('errors', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {

        return view('admin.user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserEditRequest $request, User $user)
    {

//        dd($request->all());
        $data = $request->validated();
        if (empty($data['is_admin'])){
            $data['is_admin'] = 0;
        };

        $save = $user->fill($data)->save();
        if ($save){
            return redirect()->route('admin.user.index')->with('success', 'Запись успешно обновилась');
        }
        return back()->with('errors', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $delete = $user->delete();

        if ($delete){
            return back()->with('success', 'Запись успешно удалена');
        }
        return back()->with('errors', 'Не удалось удалить запись');
    }
}
