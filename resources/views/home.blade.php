<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ribbit | Hop on Conversations!</title>
</head>
<body>
    <div style="border: 3px solid black; padding: 12px;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="register-name" placeholder="name" />
            <input type="text" name="register-email" placeholder="email" />
            <input type="password" name="register-password" placeholder="password" />
            <button>Register</button>
        </form>
    </div>
</body>
</html>