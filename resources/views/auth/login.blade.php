<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?technology,dark') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            position: relative;
            color: #ffffff;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: -1;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .logo {
            width: 70px;
            margin-bottom: 10px;
        }

        h3 {
            color: #00ffff;
            font-weight: bold;
            text-shadow: 0 0 10px #00ffff;
        }

        .form-control {
            border-radius: 30px;
            padding: 12px;
            font-size: 16px;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }

        .btn-primary {
            border-radius: 30px;
            background: linear-gradient(135deg, #007bff, #00d4ff);
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
            color: #ffffff;
            box-shadow: 0px 0px 10px #007bff;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #0090ff);
            box-shadow: 0px 0px 15px #0090ff;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #222;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(255, 215, 0, 0.5);
            text-align: center;
        }

        .popup.show {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <img src="{{ asset('assets/img/images.png') }}" alt="Company Logo" class="logo"> 
        <h3>TRINWO SOLUTIONS</h3>
        
        @if(session('registered'))
            <div class="popup show" id="popupMessage">
                🎉 Welcome to Trinwo! You have created your account. Please login.
            </div>
            <script>
                setTimeout(() => {
                    document.getElementById('popupMessage').style.display = 'none';
                }, 3000);
            </script>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        
        <p class="mt-2">Don't have an account? <a href="{{ route('admin.register') }}" class="text-light">Register</a></p>
    </div>
</body>
</html>
