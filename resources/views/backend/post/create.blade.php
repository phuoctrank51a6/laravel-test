
        @if (session('success'))
        <p style="color:red">
            <strong>{{ session('success') }} </strong>
        </p>
      @endif
<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    Tiêu đề
    <br>
    <input type="text" value="" name="title">
    {!! showError($errors,'title') !!}
    <br>
    Nội dung
    <br>
    <input type="text" name="content" id="">
    {!! showError($errors,'content') !!}
    <input type="hidden" name="like" id="">
    <input type="submit">


</form>