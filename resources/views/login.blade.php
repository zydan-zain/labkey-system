<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - LABKEY SYSTEM</title>
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #0f0f0f;
            background-image: radial-gradient(circle at 50% 50%, rgba(255, 122, 0, 0.1) 0%, #0f0f0f 70%);
            color: #f5f5f5;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 122, 0, 0.2);
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-title {
            background: linear-gradient(135deg, #ff7a00, #ffb000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 5px;
            text-align: center;
        }

        .login-subtitle {
            color: #b0b0b0;
            font-size: 0.9rem;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-control {
            background-color: rgba(0, 0, 0, 0.5);
            border: 1px solid #333;
            color: #f5f5f5;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: rgba(0, 0, 0, 0.7);
            border-color: #ff7a00;
            box-shadow: 0 0 10px rgba(255, 122, 0, 0.3);
            color: #fff;
        }

        .form-control::placeholder {
            color: #888;
        }

        .input-group-text {
            background-color: rgba(0, 0, 0, 0.5);
            border: 1px solid #333;
            color: #b0b0b0;
            border-right: none;
        }

        .form-control {
            border-left: none;
        }

        .btn-orange {
            background: linear-gradient(135deg, #ff7a00, #ffb000);
            color: #0f0f0f;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-orange:hover {
            background: linear-gradient(135deg, #ff8c00, #ffc100);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 122, 0, 0.4);
            color: #0f0f0f;
        }

        .alert-custom {
            background-color: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.5);
            color: #ff6b6b;
            border-radius: 8px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h2 class="login-title">LABKEY SYSTEM</h2>
        <p class="login-subtitle">Smart Laboratory Key Management</p>

        @if(session('error'))
            <div class="alert alert-custom text-center p-2 mb-3">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-orange">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login
            </button>
        </form>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>