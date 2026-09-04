<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AR Travels</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary: #0a192f; --accent: #d4af37; }
        body { background-color: #f8f9fa; font-family: 'Inter', sans-serif; overflow-x: hidden; }
        #wrapper { display: flex; width: 100%; align-items: stretch; }
        #sidebar { min-width: 250px; max-width: 250px; background: var(--primary); color: #fff; min-height: 100vh; transition: all 0.3s; }
        #sidebar.active { margin-left: -250px; }
        #sidebar .sidebar-header { padding: 20px; background: #081222; text-align: center; }
        #sidebar ul.components { padding: 20px 0; }
        #sidebar ul li a { padding: 10px 20px; font-size: 1.1em; display: block; color: #fff; text-decoration: none; }
        #sidebar ul li a:hover, #sidebar ul li.active > a { color: var(--primary); background: var(--accent); }
        #sidebar ul li a i { margin-right: 10px; width: 20px; text-align: center; }
        #content { width: 100%; min-height: 100vh; transition: all 0.3s; padding: 20px; }
        .navbar-custom { background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.08); margin-bottom: 30px; border-radius: 8px; padding: 10px 20px; }
        .btn-custom { background: var(--accent); color: white; border: none; }
        .btn-custom:hover { background: #b5952f; color: white; }
        @media (max-width: 768px) {
            #sidebar { margin-left: -250px; position: fixed; z-index: 9999; }
            #sidebar.active { margin-left: 0; }
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>AR Travels</h3>
            </div>
            <ul class="list-unstyled components">
                <li><a href="index.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
                <li><a href="settings.php"><i class="fa-solid fa-gear"></i> Settings & Marquee</a></li>
                <li><a href="destinations.php"><i class="fa-solid fa-map-location-dot"></i> Destinations</a></li>
                <li><a href="packages.php"><i class="fa-solid fa-box-open"></i> Packages</a></li>
                <li><a href="gallery.php"><i class="fa-solid fa-images"></i> Gallery</a></li>
                <li><a href="reviews.php"><i class="fa-solid fa-star"></i> Reviews</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-custom">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <div class="ms-auto">
                        <span class="navbar-text">
                            Welcome, <strong><?php echo htmlspecialchars($_SESSION['admin_username']); ?></strong>
                        </span>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
