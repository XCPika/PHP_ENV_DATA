<?php
require_once 'connections.php';
$conn = connect("login");

$email = $_POST['email'];
$pwd = $_POST['pass'];

if ($conn) {
    $query = "SELECT * FROM users where email='$email' and password='$pwd'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['logged-in'] = 'logged';
        mysqli_close($conn);
        header("Location: http://127.0.0.1/index.php");
    } else {
        mysqli_close($conn);
        header("Location: http://127.0.0.1/components/login.php");
    }
    
} else {
    die("Connection failed: " . mysqli_connect_error());
}
?>