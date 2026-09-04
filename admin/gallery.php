<?php
require_once 'auth.php';

// Handle Add/Edit/Delete
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $title = $_POST['title'];
        $image = $_FILES['image'];

        if ($image['name']) {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $ext;
            move_uploaded_file($image['tmp_name'], "../uploads/" . $filename);

            $stmt = $conn->prepare("INSERT INTO gallery (title, image_path) VALUES (?, ?)");
            $stmt->execute([$title, "uploads/" . $filename]);
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("SELECT image_path FROM gallery WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            @unlink("../" . $row['image_path']);
            $conn->prepare("DELETE FROM gallery WHERE id = ?")->execute([$id]);
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'edit') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $conn->prepare("UPDATE gallery SET title = ? WHERE id = ?")->execute([$title, $id]);
    }
    header("Location: gallery.php");
    die();
}

$images = $conn->query("SELECT * FROM gallery ORDER BY id DESC")->fetchAll();
require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Gallery</h2>
    <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i> Add Image</button>
</div>

<div class="row">
    <?php foreach($images as $img): ?>
    <div class="col-md-3 mb-4">
        <div class="card h-100">
            <img src="../<?= $img['image_path'] ?>" class="card-img-top" style="height:200px; object-fit:cover;">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($img['title']) ?></h5>
            </div>
            <div class="card-footer bg-white d-flex justify-content-between">
                <button class="btn btn-sm btn-outline-primary" onclick="editImg(<?= $img['id'] ?>, '<?= htmlspecialchars(addslashes($img['title'])) ?>')"><i class="fas fa-edit"></i></button>
                <form method="POST" class="d-inline" onsubmit="return confirm('Delete this image?');">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $img['id'] ?>">
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
                    <h5 class="modal-title">Add Gallery Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Title (Optional)</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Image *</label>
                        <input type="file" name="image" class="form-control" required accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Gallery Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" id="edit_title" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editImg(id, title) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_title').value = title;
    new bootstrap.Modal(document.getElementById('editModal')).show();
}
</script>

<?php require_once 'footer.php'; ?>
