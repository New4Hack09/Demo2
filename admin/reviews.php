<?php
require_once 'auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $stmt = $conn->prepare("INSERT INTO reviews (name, rating, review, destination, photo) VALUES (?, ?, ?, ?, ?)");
        $photo = $_POST['photo'] ?: 'https://i.pravatar.cc/150?img=' . rand(1,70);
        $stmt->execute([$_POST['name'], $_POST['rating'], $_POST['review'], $_POST['destination'], $photo]);
    } elseif (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $conn->prepare("DELETE FROM reviews WHERE id = ?")->execute([$_POST['id']]);
    }
    header("Location: reviews.php");
    die();
}

$reviews = $conn->query("SELECT * FROM reviews ORDER BY id DESC")->fetchAll();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Reviews</h2>
    <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i> Add Review</button>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Destination</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($reviews as $rev): ?>
            <tr>
                <td><img src="<?= htmlspecialchars($rev['photo']) ?>" style="width:40px; height:40px; border-radius:50%;"></td>
                <td><?= htmlspecialchars($rev['name']) ?></td>
                <td><?= htmlspecialchars($rev['destination']) ?></td>
                <td><?= $rev['rating'] ?> <i class="fas fa-star text-warning"></i></td>
                <td><?= htmlspecialchars(substr($rev['review'], 0, 50)) ?>...</td>
                <td>
                    <form method="POST" class="d-inline" onsubmit="return confirm('Delete review?');">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $rev['id'] ?>">
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
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <input type="hidden" name="action" value="add">
                <div class="modal-header">
                    <h5 class="modal-title">Add Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Reviewer Name *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Destination Travelled To</label>
                        <input type="text" name="destination" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Rating (1-5) *</label>
                        <input type="number" name="rating" class="form-control" min="1" max="5" value="5" required>
                    </div>
                    <div class="mb-3">
                        <label>Photo URL (Optional)</label>
                        <input type="url" name="photo" class="form-control" placeholder="Leave empty for random avatar">
                    </div>
                    <div class="mb-3">
                        <label>Review Text *</label>
                        <textarea name="review" class="form-control" rows="3" required></textarea>
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
