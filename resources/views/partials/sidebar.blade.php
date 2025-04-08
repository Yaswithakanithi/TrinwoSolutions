<div class="sidebar">
    <div class="sidebar-header">
        <h3>TRINWO SOLUTIONS</h3>
        <img src="{{ asset('assets/img/images.png') }}" alt="Logo">
    </div>
    <ul class="sidebar-menu">
 
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-home"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="has-dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="fas fa-users"></i> <span>Employees</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <ul class="dropdown-content">
                <li><a href="{{ route('employees.create') }}"><i class="fas fa-user-plus"></i> Add Employee</a></li>
                <li><a href="{{ route('admin.employees.index') }}"><i class="fas fa-table"></i> Employees Table</a></li>
            </ul>
        </li>

        <li class="has-dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle">
                <i class="fas fa-handshake"></i> <span>Clients</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <ul class="dropdown-content">
                <li><a href="{{ route('clients.create') }}"><i class="fas fa-user-plus"></i> Add Client</a></li>
                <li><a href="{{ route('clients.index') }}"><i class="fas fa-table"></i> Clients Table</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.settings.index') }}">
                <i class="fas fa-cogs"></i> <span>General Settings</span>
            </a>
        </li>

       
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> <span>Sign Out</span>
            </a>
        </li>
    </ul>
</div>


<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>
