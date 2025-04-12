<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyLibrary - Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Include Navbar dan Sidebar -->
    @include('layoutsadmin.navbar')
    @include('layoutsadmin.sidebar')

    <!-- Yield Content -->
    @yield('content')

</div>

<!-- Scripts -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>

<script>
    $(document).ready(function () {
        if ($('.nav-sidebar').length) {
            $('.nav-sidebar').tree();
        }
    });

    // Event log modal buka
    document.addEventListener('show.bs.modal', function (event) {
        console.log('Modal terbuka:', event.target.id);
    });
</script>

<!-- Stack untuk script tambahan -->
@stack('scripts')
</body>
</html>
