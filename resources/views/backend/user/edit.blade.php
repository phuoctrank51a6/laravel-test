
        @if (session('success'))
        <p style="color:red">
            <strong>{{ session('success') }} </strong>
        </p>
      @endif
      <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    Tên
    <br>
    <input type="text" value="{{$user->name}}" name="name">
    {!! showError($errors,'name') !!}
    <br>
    Ngày sinh
    <br>
    <input type="date" name="date_of_birth" value="{{$user->date_of_birth}}" id="">
    {!! showError($errors,'date_of_birth') !!}
    <br>
    email
    <br>
    <input type="email" name="email" value="{{$user->email}}" id="">
    {!! showError($errors,'email') !!}
    <br>
    Mật khẩu
    <br>
    <input type="password" name="password" id="">
    {!! showError($errors,'password') !!}
    <p>Nhập lại mật khẩu</p>
    <input type="password" name="password_confirmation" id="">
    {!! showError($errors,'password_confirmation') !!}
    Quyền
    <br>
    <select name="role" id="">  
        <option @if ($user->role == 1) selected @endif value="1">Admin</option>
        <option  @if ($user->role == 2) selected @endif value="2">User</option>
    </select>
    <br>
    <input type="file" name="avatar" id="">
    {!! showError($errors,'avatar') !!}
    <br>
    <input type="submit">

</form>