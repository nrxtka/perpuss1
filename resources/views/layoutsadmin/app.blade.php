<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyLibrary - Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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

<!-- Bootstrap Datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
$(document).ready(function () {
  $('#tahun_terbit').datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years",
    autoclose: true
  });

  // Biar nggak bisa ngetik manual
  $('#tahun_terbit').on('keydown paste', function(e) {
    e.preventDefault();
  });

  // Langsung munculin datepicker pas klik field input
  $('#tahun_terbit').on('focus', function () {
    $(this).datepicker('show');
  });


});
</script> <!-- ← ini tadinya salah (tidak ditutup) -->



<!-- Stack untuk script tambahan -->
@stack('scripts')
</body>
</html>
