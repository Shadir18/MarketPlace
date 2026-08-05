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
<body class="layout-fixed sidebar-expand-lg bg-body-gradient">
    <div class="app-wrapper">
        <x-admin-header /> 
        @if(!request()->is('/'))
            <x-sidebar />
        @endif
        <main class="app-main pt-1 mt-2">
            <div class="container-fluid p-0">
                @if(isset($heading))
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ $heading }}</h1>
                    </div>
                @endif
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
<script type="module">
window.handleLogout = function() {
axios.post('/logout')
    .then(function(response) {
        window.location.href = '/';
    })
    .catch(function(error) {
        console.error('Logout failed:', error);
        alert('An error occurred during logout. Please try again.');
    });
}
</script>