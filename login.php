<?php
include 'includes/config.php';
session_start();

$error = "";

// 1. Handle Sign Up
if (isset($_POST['signup'])) {
    $name = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = $pdo->prepare("SELECT id FROM admins WHERE username = ?");
    $check->execute([$email]);
    
    if ($check->rowCount() > 0) {
        $error = "Email already registered!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO admins (username, password_hash) VALUES (?, ?)");
        if ($stmt->execute([$email, $password])) {
            echo "<script>alert('Account created! Please login.');</script>";
        }
    }
}

// 2. Handle Login
if (isset($_POST['login'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kape Kuripot | Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="auth-body">

<div class="auth-container">
    <div class="auth-left">
        <h2>Kape Kuripot</h2>
        <p>Your daily coffee, one click away.</p>
        <?php if($error): ?>
            <p style="color: #ff8a80; background: rgba(0,0,0,0.2); padding: 10px; border-radius: 5px;"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>

    <div class="auth-right">
        <div class="auth-tabs">
            <button class="tab-btn active" id="loginTab">Login</button>
            <button class="tab-btn" id="signupTab">Sign Up</button>
        </div>

        <form id="loginForm" class="auth-form" method="POST" action="login.php">
            <h3>Welcome Back</h3>
            <input type="email" name="email" placeholder="Email Address" required>
            <div class="password-box">
                <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                <span class="material-icons toggle-pass" data-target="loginPassword">visibility</span>
            </div>
            <button type="submit" name="login" class="auth-btn">Login</button>
            <p class="auth-note">Forgot your password?</p>
        </form>

        <form id="signupForm" class="auth-form hidden" method="POST" action="login.php">
            <h3>Create Account</h3>
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <div class="password-box">
                <input type="password" name="password" id="signupPassword" placeholder="Password" required>
                <span class="material-icons toggle-pass" data-target="signupPassword">visibility</span>
            </div>
            <button type="submit" name="signup" class="auth-btn">Sign Up</button>
        </form>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>