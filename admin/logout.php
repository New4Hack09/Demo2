<?php
require_once '../config.php';

if (isset($_SESSION['admin_id'])) {
    $stmt = $conn->prepare("UPDATE admin_users SET remember_token = NULL WHERE id = ?");
    $stmt->execute([$_SESSION['admin_id']]);
}

session_destroy();
setcookie('admin_remember', '', time() - 3600, '/');

header("Location: login.php");
die();
?>
