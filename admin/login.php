<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    if ($password === 'admin123') { // change the pass here
        $_SESSION['admin_logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Incorrect password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input type="password" name="password" placeholder="Enter password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
