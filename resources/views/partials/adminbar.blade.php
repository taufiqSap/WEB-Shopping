<nav class="navbar navbar-light bg-white shadow-sm fixed-top">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand font-weight-bold text-primary" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fish mr-2"></i>Admin Panel
        </a>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}" class="form-inline">
            @csrf
            <span class="navbar-text mr-3 d-none d-sm-block">
                Hello, {{ Auth::user()->name }}
            </span>
            <button type="submit" class="btn btn-outline-danger btn-sm">
                <i class="fas fa-sign-out-alt mr-1"></i> Logout
            </button>
        </form>
    </div>
</nav>

<div style="padding-top: 60px;"></div>