<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?business,dark') no-repeat center center/cover;
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
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .logo {
            width: 90px;
            margin-bottom: 15px;
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

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
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

        .text-light {
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
        }

        .text-light:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <img src="https://media.licdn.com/dms/image/v2/C4D0BAQEbeXw67VsGbQ/company-logo_200_200/company-logo_200_200/0/1630520456068?e=2147483647&v=beta&t=5dsNc8N_3RqBEmDAdabMFfCkTJC-eKctU-PE6dAf8gk" alt="Company Logo" class="logo">
        <h3>TRINWO SOLUTIONS</h3>

        <form action="{{ route('admin.register') }}" method="POST">
            @csrf
            <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>
            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Confirm Password" required>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>

        <p class="mt-3">Already have an account? <a href="{{ route('login') }}" class="text-light">Login</a></p>
    </div>
</body>
</html>
