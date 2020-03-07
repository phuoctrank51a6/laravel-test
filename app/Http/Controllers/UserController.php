<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::all();
        // dd($users);
        return view('backend.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // dd($request);
        $data = Arr::except($request->all(), [
            '_token',
            'avatar'
            ]);
            // dd($data);
        if($request['avatar'] != null){
            $data['avatar'] = $request->file('avatar')->store('user', 'public');
        }else{
            $data['avatar'] = 'user/no-image.png';
        }
        // dd($data);  
        $data['password']=bcrypt($data['password']);
        // dd($data);  
        User::create($data);
        return redirect()->back()->with('success', 'Đăng ký tài khoản thành công')->withInput();
    }

    function edit($id){
        // dd($id);
        $data['user'] = User::find($id);
        // dd($user->name);
        return view('backend.user.edit',$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        // dd($id);
        $data = Arr::except(request()->all(), ["_token","avatar"]);
        // dd($request);
        $user = User::find($id);
        // dd($request['status']);
        if($request['avatar'] != null){
            $user['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
        // dd($user['avatar']);
        if($data['password'] != null){
            $user->password = bcrypt($data['password']);
        }
        // dd($user);
    
        $user->name = $data['name'];
        $user->date_of_birth = $data['date_of_birth'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        $user->update();
        return redirect()->route('user.edit',  $id)->with('success', 'Sửa tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
