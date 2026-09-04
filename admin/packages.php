<?php
require_once 'auth.php';

// Handle Add/Edit/Delete
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = $_POST['id'];

        // Delete all associated images from server
        $imgs = $conn->prepare("SELECT image_path FROM package_images WHERE package_id = ?");
        $imgs->execute([$id]);
        while($img = $imgs->fetch()) {
            @unlink("../" . $img['image_path']);
        }

        $conn->prepare("DELETE FROM packages WHERE id = ?")->execute([$id]);

    } elseif (isset($_POST['action']) && $_POST['action'] == 'add') {
        $stmt = $conn->prepare("INSERT INTO packages (title, destination, duration, price, old_price, discount, highlights, itinerary, inclusions, exclusions) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Process JSON arrays (split by newline for simplicity in this basic version)
        $highlights = json_encode(array_filter(array_map('trim', explode("\n", $_POST['highlights']))));
        $inclusions = json_encode(array_filter(array_map('trim', explode("\n", $_POST['inclusions']))));
        $exclusions = json_encode(array_filter(array_map('trim', explode("\n", $_POST['exclusions']))));

        // Process Itinerary
        $itinerary_raw = array_filter(array_map('trim', explode("\n", $_POST['itinerary'])));
        $itinerary = [];
        foreach($itinerary_raw as $day) {
            // Expecting format: "Day 1|Arrival|Description here"
            $parts = explode("|", $day);
            if(count($parts) >= 3) {
                $itinerary[] = [
                    "day" => trim($parts[0]),
                    "title" => trim($parts[1]),
                    "description" => trim($parts[2])
                ];
            }
        }
        $itinerary_json = json_encode($itinerary);

        $stmt->execute([
            $_POST['title'], $_POST['destination'], $_POST['duration'], $_POST['price'],
            $_POST['old_price'], $_POST['discount'], $highlights, $itinerary_json, $inclusions, $exclusions
        ]);

        $pkg_id = $conn->lastInsertId();

        // Handle multiple image uploads
        if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $file_name = $_FILES['images']['name'][$key];
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $new_filename = uniqid() . '_' . $key . '.' . $ext;

                if (move_uploaded_file($tmp_name, "../uploads/" . $new_filename)) {
                    $is_main = ($key == 0) ? 1 : 0; // Make first image the main one
                    $img_stmt = $conn->prepare("INSERT INTO package_images (package_id, image_path, is_main) VALUES (?, ?, ?)");
                    $img_stmt->execute([$pkg_id, "uploads/" . $new_filename, $is_main]);
                }
            }
        }
    }
    header("Location: packages.php");
    die();
}

$packages = $conn->query("SELECT p.*, (SELECT image_path FROM package_images WHERE package_id = p.id AND is_main = 1 LIMIT 1) as main_image FROM packages p ORDER BY id DESC")->fetchAll();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Packages</h2>
    <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i> Add Package</button>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Destination</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($packages as $pkg): ?>
            <tr>
                <td>
                    <?php if($pkg['main_image']): ?>
                        <img src="../<?= $pkg['main_image'] ?>" style="width:60px; height:60px; object-fit:cover; border-radius:4px;">
                    <?php else: ?>
                        <div style="width:60px; height:60px; background:#eee; display:flex; align-items:center; justify-content:center;">No Img</div>
                    <?php endif; ?>
                </td>
                <td><strong><?= htmlspecialchars($pkg['title']) ?></strong></td>
                <td><?= htmlspecialchars($pkg['destination']) ?></td>
                <td><?= htmlspecialchars($pkg['price']) ?></td>
                <td><?= htmlspecialchars($pkg['duration']) ?></td>
                <td>
                    <form method="POST" class="d-inline" onsubmit="return confirm('Delete this package and all its images?');">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $pkg['id'] ?>">
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">
                <div class="modal-header">
                    <h5 class="modal-title">Add Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Title *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Destination *</label>
                            <input type="text" name="destination" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Duration * (e.g. 5 Days / 4 Nights)</label>
                            <input type="text" name="duration" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Price * (e.g. ₹35,000)</label>
                            <input type="text" name="price" class="form-control" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Old Price</label>
                            <input type="text" name="old_price" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Discount</label>
                            <input type="text" name="discount" class="form-control" placeholder="15% OFF">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Images (Select multiple. First image will be main) *</label>
                        <input type="file" name="images[]" class="form-control" multiple accept="image/*" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Highlights (One per line)</label>
                            <textarea name="highlights" class="form-control" rows="3" placeholder="Burj Khalifa&#10;Desert Safari"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Inclusions (One per line)</label>
                            <textarea name="inclusions" class="form-control" rows="3" placeholder="Hotel&#10;Breakfast"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Exclusions (One per line)</label>
                            <textarea name="exclusions" class="form-control" rows="3" placeholder="Flights&#10;Visa"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Itinerary (Format: Day|Title|Desc - One per line)</label>
                            <textarea name="itinerary" class="form-control" rows="3" placeholder="Day 1|Arrival|Transfer to hotel...&#10;Day 2|City Tour|Visit monuments..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">Save Package</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
