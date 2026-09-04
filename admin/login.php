<?php
require_once '../config.php';

if (isset($_SESSION['admin_logged_in']) || isset($_COOKIE['admin_remember'])) {
    header("Location: index.php");
    die();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    $stmt = $conn->prepare("SELECT id, username, password FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_username'] = $user['username'];

        if ($remember) {
            $token = bin2hex(random_bytes(32));
            $stmt = $conn->prepare("UPDATE admin_users SET remember_token = ? WHERE id = ?");
            $stmt->execute([$token, $user['id']]);
            setcookie('admin_remember', $token, time() + (86400 * 30), "/");
        }

        header("Location: index.php");
        die();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - AR Travels</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body { background: #0a192f; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .login-box { background: white; padding: 2rem; border-radius: 8px; width: 100%; max-width: 400px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); }
        .btn-primary { background: #d4af37; border-color: #d4af37; }
        .btn-primary:hover { background: #b5952f; border-color: #b5952f; }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="text-center mb-4">
            <h2>AR Travels</h2>
            <p class="text-muted">Admin Panel</p>
        </div>
        <?php if($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
