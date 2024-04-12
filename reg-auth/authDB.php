<?php
session_start();
require("../connect/connect.php");

$email = strip_tags(trim($_POST['email']));
$pass = strip_tags(trim($_POST['pass']));

$user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `Users` WHERE `email` = '$email' and `password_hash` = '$pass'"));

if(count($user) == 0 ) {
    echo "<script>alert('Проверьте корректность введенность данных!');</script>";
} else {
    $_SESSION["user_id"] = $user["user_id"];
	header('Location: ../admin');
}

?>