<?php
require_once 'auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $image = $_FILES['image'];
        $filepath = '';
        if ($image['name']) {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $ext;
            move_uploaded_file($image['tmp_name'], "../uploads/" . $filename);
            $filepath = "uploads/" . $filename;
        }

        $stmt = $conn->prepare("INSERT INTO destinations (name, description, price, category, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$_POST['name'], $_POST['description'], $_POST['price'], $_POST['category'], $filepath]);

    } elseif (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("SELECT image FROM destinations WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row && $row['image']) {
            @unlink("../" . $row['image']);
        }
        $conn->prepare("DELETE FROM destinations WHERE id = ?")->execute([$id]);
    }
    header("Location: destinations.php");
    die();
}

$destinations = $conn->query("SELECT * FROM destinations ORDER BY id DESC")->fetchAll();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Destinations</h2>
    <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i> Add Destination</button>
</div>

<div class="row">
    <?php foreach($destinations as $dest): ?>
    <div class="col-md-3 mb-4">
        <div class="card h-100">
            <img src="../<?= $dest['image'] ?: 'assets/images/placeholder.jpg' ?>" class="card-img-top" style="height:200px; object-fit:cover;">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($dest['name']) ?></h5>
                <p class="card-text text-muted small"><?= htmlspecialchars($dest['category']) ?> | <?= htmlspecialchars($dest['price']) ?></p>
                <p class="card-text small"><?= htmlspecialchars(substr($dest['description'], 0, 80)) ?>...</p>
            </div>
            <div class="card-footer bg-white text-end">
                <form method="POST" class="d-inline" onsubmit="return confirm('Delete this destination?');">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $dest['id'] ?>">
                    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">
                <div class="modal-header">
                    <h5 class="modal-title">Add Destination</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Category *</label>
                        <select name="category" class="form-control" required>
                            <option value="International">International</option>
                            <option value="Domestic">Domestic</option>
                            <option value="Beach">Beach</option>
                            <option value="Mountains">Mountains</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Starting Price</label>
                        <input type="text" name="price" class="form-control" placeholder="e.g. ₹35,000">
                    </div>
                    <div class="mb-3">
                        <label>Image *</label>
                        <input type="file" name="image" class="form-control" required accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
