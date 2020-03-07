
        @if (session('success'))
        <p style="color:red">
            <strong>{{ session('success') }} </strong>
        </p>
      @endif
      <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    Tên
    <br>
    <input type="text" value="" name="name">
    {!! showError($errors,'name') !!}
    <br>
    Ngày sinh
    <br>
    <input type="date" name="date_of_birth" id="">
    {!! showError($errors,'date_of_birth') !!}
    <br>
    email
    <br>
    <input type="email" name="email" id="">
    {!! showError($errors,'email') !!}
    <br>
    Mật khẩu
    <br>
    <input type="password" name="password" id="">
    {!! showError($errors,'password') !!}
    <p>Nhập lại mật khẩu</p>
    <input type="password" name="password_confirmation" id="">
    {!! showError($errors,'password_confirmation') !!}
    <br>
    Quyền
    <br>
    <select name="role" id="">  
        <option value="1">Admin</option>
        <option value="2">User</option>
    </select>
    <br>
    <input type="file" name="avatar" id="">
    {!! showError($errors,'avatar') !!}
    <br>
    <input type="submit">


</form>