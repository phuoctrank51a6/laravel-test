<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Arr;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =Post::all();
        // dd($posts);
        return view('backend.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // dd($request);
        $data = Arr::except($request->all(), ['_token']);
            // dd($data);
        Post::create($data);
        return redirect()->back()->with('success', 'Thêm tài khoản thành công')->withInput();
    }

    function edit($id){
        // dd($id);
        $data['post'] = Post::find($id);
        // dd($data);
        return view('backend.post.edit',$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
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
