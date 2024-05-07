<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Navbar Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .navbar {
            background-color: #e6e6e6;
        }

        .navbar-nav .nav-link {
            font-weight: bold;
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-link.active {
            background-color: #007bff;
            color: #fff;
            box-shadow: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid justify-content-between">
        <a class="navbar-brand" href="index.php">
            <img src="img/nav_image2.png" alt="Navbar Brand">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/modules.php') ? 'active' : ''; ?>"
                       href="modules.php">My Modules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/students.php') ? 'active' : ''; ?>"
                       href="students.php">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/addstudent.php') ? 'active' : ''; ?>"
                       href="addstudent.php">Add Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/assignmodule.php') ? 'active' : ''; ?>"
                       href="assignmodule.php">Assign Module</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/details.php') ? 'active' : ''; ?>"
                       href="details.php">My Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/logout.php') ? 'active' : ''; ?>"
                       href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

