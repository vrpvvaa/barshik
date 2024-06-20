<?php
session_start();
require("../connect/connect.php");

$email = strip_tags(trim($_POST['email']));
$pass = strip_tags(trim($_POST['pass']));

$user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `Users` WHERE `email` = '$email' and `password_hash` = '$pass'"));

if(count($user) == 0 ) {
    echo "<script>alert('Проверьте корректность введенность данных!');</script>";
} else {
    if ($user['Role'] == "admin") {
        $_SESSION["user_id"] = $user["User_id"];
        $_SESSION["role"] = $user["Role"];
        $_SESSION["mess"] = "Вы авторизовались как админ";
        header('Location: ../admin');
    } else {
        $_SESSION["user_id"] = $user["User_id"];
        $_SESSION["role"] = $user["Role"];
        $_SESSION["mess"] = "Вы авторизовались как пользователь";
        header('Location: ../user');
    }
}

?>