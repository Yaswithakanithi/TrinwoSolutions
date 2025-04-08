<nav class="navbar">
    <div class="nav-container">
        <a href="#" class="logo">Admin Dashboard</a>
        <ul class="nav-menu">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>

            <!-- Employees Dropdown -->
            <li class="dropdown">
                <a href="#" class="dropdown-btn">
                    <i class="fas fa-users"></i> Employees <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-content">
                    <li><a href="{{ route('employees.create') }}"><i class="fas fa-user-plus"></i> Add Employee</a></li>
                    <li><a href="{{ route('employee.dashboard') }}"><i class="fas fa-id-card"></i> View Employee Dashboard</a></li>
                    <li><a href="{{ route('employees.index') }}"><i class="fas fa-table"></i> Employees Table</a></li>
                </ul>
            </li>

            <!-- Clients Dropdown -->
            <li class="dropdown">
                <a href="#" class="dropdown-btn">
                    <i class="fas fa-handshake"></i> Clients <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="dropdown-content">
                    <li><a href="{{ route('clients.create') }}"><i class="fas fa-user-plus"></i> Add Client</a></li>
                    <li><a href="{{ route('clients.index') }}"><i class="fas fa-table"></i> Clients Table</a></li>
                </ul>
            </li>

            <li><a href="{{ route('settings.index') }}"><i class="fas fa-cogs"></i> General Settings</a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Sign Out
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>
