
        @if (session('success'))
        <p style="color:red">
            <strong>{{ session('success') }} </strong>
        </p>
      @endif
      <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    Tên
    <br>
    <input type="text" value="{{$post->title}}" name="title">
    {!! showError($errors,'title') !!}
    <br>
    Ngày sinh
    <br>
<textarea name="" id="" name="content" cols="30" rows="10">{{$post->content}}</textarea>
    {!! showError($errors,'content') !!}
    <input type="hidden" value=" {{$post->like}} " name="like" id="">
    <br>
    <input type="submit">

</form>