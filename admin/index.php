<?php
require_once 'auth.php';
require_once 'header.php';

// Quick stats
$stats = [];
$stats['destinations'] = $conn->query("SELECT COUNT(*) FROM destinations")->fetchColumn();
$stats['packages'] = $conn->query("SELECT COUNT(*) FROM packages")->fetchColumn();
$stats['gallery'] = $conn->query("SELECT COUNT(*) FROM gallery")->fetchColumn();
$stats['reviews'] = $conn->query("SELECT COUNT(*) FROM reviews")->fetchColumn();
?>

<h2 class="mb-4">Dashboard Overview</h2>
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary h-100">
            <div class="card-body">
                <h5 class="card-title">Destinations</h5>
                <h2 class="display-4"><?= $stats['destinations'] ?></h2>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="destinations.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success h-100">
            <div class="card-body">
                <h5 class="card-title">Packages</h5>
                <h2 class="display-4"><?= $stats['packages'] ?></h2>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="packages.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning h-100">
            <div class="card-body">
                <h5 class="card-title">Gallery Images</h5>
                <h2 class="display-4"><?= $stats['gallery'] ?></h2>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="gallery.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-info h-100">
            <div class="card-body">
                <h5 class="card-title">Reviews</h5>
                <h2 class="display-4"><?= $stats['reviews'] ?></h2>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="reviews.php">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
