<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        <p>Congrats youre logged in</p> 
        <form action="/logout" method="post">
        @csrf
        <button>log  out</button>
    </form>

    <div style="border: 1px solid black; padding:30px">
        <h2>Create a new post</h2>
        <form action="/create-post" method="post">
            @csrf
            <input name="title" type="text" placeholder="post title">
            <textarea name="body" placeholder="escreva seu post..."></textarea>
        <button>save post</button>
        </form>
    </div>
    <div style="border: 1px solid black; padding:30px">
    <h2>All posts</h2>
    @foreach ($posts as $post)
        <h3>{{ $post['title'] }}</h3>
        {{ $post['body'] }}
        <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
        <form action="/delete/post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
        @endforeach
    </div>
    @else    
    <div style="border: 1px solid black; padding:30px">
        <h1 id="title">Register</h1>
        <form action="/register" method="post">
            @csrf
            <input name="name" type="name" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button type="submit">Register</button>
        </form>
    </div>

    <div style="border: 1px solid black; padding:30px">
        <h1 id="title">Login</h1>
        <form action="/login" method="post">
            @csrf
            <input name="loginname" type="name" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button type="submit">Login</button>
        </form>
    </div>
    @endauth
</body>
</html>