<?php
session_start();

// Cek apakah form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cek kredensial dan arahkan ke halaman yang sesuai
    if ($username == "admin" && $password == "admin") {
        $_SESSION["user_role"];
        header("Location: menuutama.php");
        exit();
    } elseif ($username == "operator" && $password == "operator") {
        $_SESSION["user_role"];
        header('Location: menuoperator.php');
        exit();
    } elseif ($username == "umum" && $password == "umum") {
        $_SESSION["user_role"];
        header('Location: menuumum.php');
        exit();
    } else {
        echo "Login failed. Invalid username or password.";
    }
}
?>
