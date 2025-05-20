<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">Work Dekho</div>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section class="hero">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
        <p>You are now logged in to your dashboard.</p>
    </section>
</body>
</html>