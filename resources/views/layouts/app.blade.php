<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>College Department System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }

        .dark-mode .navbar {
            background-color: #1f1f1f !important;
        }

        .dark-mode .card,
        .dark-mode .alert {
            background-color: #1e1e1e;
            border-color: #333;
            color: #e0e0e0;
        }

        .dark-mode .btn-outline-primary,
        .dark-mode .btn-outline-success,
        .dark-mode .btn-outline-light {
            border-color: #aaa;
            color: #aaa;
        }

        .dark-mode .btn-outline-primary:hover,
        .dark-mode .btn-outline-success:hover,
        .dark-mode .btn-outline-light:hover {
            background-color: #aaa;
            color: #000;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">College Department System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('colleges.index') }}">Colleges</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('departments.index') }}">Departments</a>
                    </li>
                </ul>

                <button id="toggleDarkMode" class="btn btn-outline-light">
                    <i id="darkModeIcon" class="bi bi-moon-fill"></i>
                </button>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggle = document.getElementById('toggleDarkMode');
        const icon = document.getElementById('darkModeIcon');

        // Initial load
        if (localStorage.getItem('dark-mode') === 'enabled') {
            document.body.classList.add('dark-mode');
            icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
        }

        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const isDark = document.body.classList.contains('dark-mode');
            icon.classList.toggle('bi-moon-fill', !isDark);
            icon.classList.toggle('bi-sun-fill', isDark);
            localStorage.setItem('dark-mode', isDark ? 'enabled' : 'disabled');
        });
    </script>
</body>
</html>
