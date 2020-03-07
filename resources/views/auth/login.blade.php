
        @if (session('success'))
        <p style="color:red">
            <strong>{{ session('success') }} </strong>
        </p>
      @endif
<form action="{{route('postLogin')}}" method="post">
    @csrf
    <p>email</p>
    <input type="text" name="email" id="">
    {!! showError($errors,'email') !!}
    <p>Mật khẩu</p>
    <input type="password" name="password" name="password" id="">
    {!! showError($errors,'password') !!}
    <br>
    <input type="submit">
</form>
