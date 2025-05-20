<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($email) && !empty($password)) {
        // Use correct column name: fullname instead of name
        $stmt = $conn->prepare("SELECT id, fullname, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['fullname']; // use fullname
                header("Location: index.html"); // Redirect to home
                exit;
            } else {
                echo "<script>alert('Incorrect password');</script>";
            }
        } else {
            echo "<script>alert('User not found');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please fill in both fields');</script>";
    }
}
?>
