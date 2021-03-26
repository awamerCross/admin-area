<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <ul class="navbar-nav mx-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">
                <i class="fas fa-user"></i>  الملف الشخصي
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <a href="index3.html" class="nav-link"><i class="fas fa-door-open"></i> تسجيل الخروج</a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>



</nav>
<!-- /.navbar -->
