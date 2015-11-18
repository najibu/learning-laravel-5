<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My First App</title>
    <link rel="stylesheet" href="/css/all.css">
</head>
<body>
    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}

        <div class="form-group">
            Email
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            Password
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <div>
            <button type="submit" class="btn btn-default">Login</button>
        </div>
    </form>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
    @endif
</body>
</html>

