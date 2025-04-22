<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }

        .navbar {
            background-color: #343a40 !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #ffffff !important;
            transition: color 0.3s ease, border-bottom 0.3s ease;
        }

        .navbar .nav-link.active {
            font-weight: bold;
            color: #f8d7da !important;
        }

        .navbar .nav-link:hover {
            color: #adb5bd !important;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <span>Sistem CRUD Akademik</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'mahasiswa.php') ? 'active' : ''; ?>" href="mahasiswa.php">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'matakuliah.php') ? 'active' : ''; ?>" href="matakuliah.php">Mata Kuliah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'krs.php') ? 'active' : ''; ?>" href="krs.php">KRS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>
