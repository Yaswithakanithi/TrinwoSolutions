<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Employee Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f9;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color:rgb(46, 116, 215); /* Dark grayish-blue */
            color: #f3f4f6;
            height: 100vh;
            padding-top: 25px;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 2px 0 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar-header img {
            width: 80px;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .sidebar h2 {
            font-size: 20px;
            color: #f9fafb;
            text-transform: uppercase;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 14px 20px;
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
        }

        .sidebar ul li:hover {
            background:rgb(95, 118, 154);
            border-left: 4px solid #60a5fa;
        }

        .sidebar ul li a {
            color: #e5e7eb;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-weight: 500;
        }

        .sidebar ul li a i {
            margin-right: 12px;
            font-size: 16px;
        }

        .main-content {
            margin-left: 250px;
            padding: 40px;
            width: calc(100% - 250px);
            min-height: 100vh;
            background: #f9fafb;
        }

        .dashboard-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            transition: background 0.3s ease-in-out;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #b91c1c;
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('assets/img/images.png') }}" alt="Company Logo">
            <h2>Employee Panel</h2>
        </div>
        <ul>
            <li><a href="{{ route('mainemployee.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('mainemployee.profile') }}"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="{{ route('mainemployee.clients.create') }}"><i class="fas fa-user-plus"></i> Add Client</a></li>
            <li><a href="{{ route('mainemployee.clients.index') }}"><i class="fas fa-users"></i> Clients</a></li>
            <li>
                <a href="{{ route('employee.logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="dashboard-container">
            @yield('content')
        </div>
    </div>

    <form id="logout-form" action="{{ route('employee.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</body>
</html>
