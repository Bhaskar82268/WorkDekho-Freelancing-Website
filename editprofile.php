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
    <title>Edit Profile - Work Dekho</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">Work Dekho</div>
            <ul class="nav-links">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1>Edit Profile</h1>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>" required><br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="" required><br><br>
            <input type="submit" value="Update Profile">
        </form>
    </section>
</body>
</html>
