<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>danh sách</title>
</head>
<body>
    <table>
        <tr>
            <td>Tiêu đề</td>
            <td>Nội dung</td>
            <td>Thích</td>
            <td><a href="{{route('post.create')}}">Thêm</a></td>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td> {{$post->title}} </td>
            <td> {{$post->content}} </td>
            <td> {{$post->like}} </td>
            <td>
                <a href="{{ route('post.edit', $post->id) }}">Sửa</a>
            <a href="{{route('post.destroy',$post->id)}}">Xóa</a>
            </td>
        </tr>
            
        @endforeach
    </table>
</body>
</html>