<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Sidebar toggle -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <!-- Logout Icon -->
<li class="nav-item mx-1">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-link nav-link" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
        </button>
    </form>
</li>

        
    </ul>
</nav>
