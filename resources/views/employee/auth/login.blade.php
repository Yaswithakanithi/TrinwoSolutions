<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login | Trinwo Solutions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #004d7a, #008793, #00bf72);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            width: 120px;
        }
        .logo h1 {
            margin: 10px 0;
            font-size: 32px;
            color: white;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 35px;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            width: 400px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 26px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 14px;
            background: #008793;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: background 0.3s ease-in-out;
        }
        button:hover {
            background: #006d5b;
        }
        .alert {
            color: red;
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="{{ asset('assets/img/images.png') }}" alt="Company Logo">
        <h1>Trinwo Solutions</h1>
    </div>
    <div class="login-container">
        <h2>Employee Login</h2>
        <form action="{{ route('employee.login.post') }}" method="POST">
            @csrf
            <input type="text" name="employee_id" placeholder="Employee ID" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>