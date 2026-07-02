<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product CRUD</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-mini bg-body-tertiary">
  <div class="app-wrapper">
    @auth
    <x-header />
    <x-sidebar />
    @endauth
    <main class="app-main">
      <div>
        <div>
          {{ $slot }}
        </div>
      </div>
    </main>
  </div>
</body>
</html>
<script type="module">
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

window.handleLogout = function() {
    $.post('/logout')
        .done(function(response) {
            window.location.href = '/';
        })
        .fail(function(xhr, status, error) {
            console.error('Logout failed:', error);
        });
}
</script>