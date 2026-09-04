<?php
require_once 'auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $settings = [
        'business_name' => $_POST['business_name'],
        'phone' => $_POST['phone'],
        'whatsapp' => $_POST['whatsapp'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'marquee_text' => $_POST['marquee_text'],
        'marquee_speed' => $_POST['marquee_speed'],
        'instagram' => $_POST['instagram'],
        'facebook' => $_POST['facebook'],
        'youtube' => $_POST['youtube']
    ];

    $stmt = $conn->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?");
    foreach ($settings as $key => $val) {
        $stmt->execute([$val, $key]);
    }
    $msg = "Settings updated successfully!";
}

// Fetch current settings
$stmt = $conn->query("SELECT setting_key, setting_value FROM settings");
$current_settings = [];
while ($row = $stmt->fetch()) {
    $current_settings[$row['setting_key']] = $row['setting_value'];
}

require_once 'header.php';
?>

<div class="card mb-4">
    <div class="card-header bg-white">
        <h4 class="mb-0">Website Settings</h4>
    </div>
    <div class="card-body">
        <?php if(isset($msg)): ?><div class="alert alert-success"><?= $msg ?></div><?php endif; ?>

        <form method="POST">
            <h5 class="mb-3 text-primary">Marquee (Scrolling Text) Settings</h5>
            <div class="row mb-4">
                <div class="col-md-9 mb-3">
                    <label>Marquee Text</label>
                    <input type="text" name="marquee_text" class="form-control" value="<?= htmlspecialchars($current_settings['marquee_text'] ?? '') ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Speed (seconds) <small>Lower is faster</small></label>
                    <input type="number" name="marquee_speed" class="form-control" value="<?= htmlspecialchars($current_settings['marquee_speed'] ?? '15') ?>">
                </div>
            </div>

            <h5 class="mb-3 text-primary">Business Information</h5>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label>Business Name</label>
                    <input type="text" name="business_name" class="form-control" value="<?= htmlspecialchars($current_settings['business_name'] ?? '') ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Phone Number (with code)</label>
                    <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($current_settings['phone'] ?? '') ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>WhatsApp Number (numbers only, e.g. 919876543210)</label>
                    <input type="text" name="whatsapp" class="form-control" value="<?= htmlspecialchars($current_settings['whatsapp'] ?? '') ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($current_settings['email'] ?? '') ?>">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Physical Address</label>
                    <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($current_settings['address'] ?? '') ?>">
                </div>
            </div>

            <h5 class="mb-3 text-primary">Social Links</h5>
            <div class="row mb-3">
                <div class="col-md-4 mb-3">
                    <label>Instagram URL</label>
                    <input type="text" name="instagram" class="form-control" value="<?= htmlspecialchars($current_settings['instagram'] ?? '') ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Facebook URL</label>
                    <input type="text" name="facebook" class="form-control" value="<?= htmlspecialchars($current_settings['facebook'] ?? '') ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>YouTube URL</label>
                    <input type="text" name="youtube" class="form-control" value="<?= htmlspecialchars($current_settings['youtube'] ?? '') ?>">
                </div>
            </div>

            <button type="submit" class="btn btn-custom">Save Settings</button>
        </form>
    </div>
</div>

<?php require_once 'footer.php'; ?>
