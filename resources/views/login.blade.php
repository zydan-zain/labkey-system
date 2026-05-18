<!DOCTYPE html>
<html>
<head>

    <title>Login Admin</title>

    <style>

        body{
            font-family:Arial;
            background:#f5f5f5;
        }

        .box{
            width:300px;
            margin:100px auto;
            background:white;
            padding:30px;
            border-radius:10px;
        }

        input{
            width:100%;
            padding:10px;
            margin-bottom:10px;
            box-sizing:border-box;
        }

        button{
            width:100%;
            padding:10px;
            cursor:pointer;
        }

        .error{
            color:red;
            margin-bottom:10px;
        }

    </style>

</head>
<body>

    <div class="box">

        <h2>Login Admin</h2>

        @if(session('error'))

            <div class="error">

                {{ session('error') }}

            </div>

        @endif

        <form method="POST" action="/login">

            @csrf

            <input
                type="text"
                name="username"
                placeholder="Username"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >

            <button type="submit">
                Login
            </button>

        </form>

    </div>

</body>
</html>