<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ribbit | Hop on Conversations!</title>
</head>
<body>
    @auth

    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>

    <div style="border: 3px solid black; padding: 12px;">
        <h2>Create a New Post!</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="title" />
            <textarea name="body" placeholder="Content goes here..."></textarea>
            <button>Create Post</button>
        </form>
    </div>

    <div style="border: 3px solid black; padding: 12px;">
        <h2>Your Posts</h2>

        @foreach ($posts as $post)

        <div style="background-color: lightgray; padding: 12px; margin-bottom: 12px;">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->body }}</p>
            <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
            <form action="/delete-post/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')

                <button>Delete</button>
            </form>
        </div>

        @endforeach
    </div>

    @else

    <div style="border: 3px solid black; padding: 12px;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name" />
            <input type="text" name="email" placeholder="email" />
            <input type="password" name="password" placeholder="password" />
            <button>Register</button>
        </form>
    </div>

    <div style="border: 3px solid black; padding: 12px;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="login-name" placeholder="name" />
            <input type="password" name="login-password" placeholder="password" />
            <button>Login</button>
        </form>
    </div>

    @endauth
    
</body>
</html>