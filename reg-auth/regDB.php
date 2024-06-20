<?php
session_start();
require ("../connect/connect.php");

$email = strip_tags(trim($_POST['email']));
$pass = strip_tags(trim($_POST['pass']));

$result = mysqli_query($con,"SELECT * FROM `Users` WHERE `Email` = '$email'");
$user = mysqli_fetch_assoc($result); // Конвертируем в массив
if(!empty($user)){
	echo "<script>alert('Данная эл. почта уже используется!'); location.href = 'registration.php';</script>";
} else {
    mysqli_query($con,"INSERT INTO `Users`(`Email`, `Password_hash`, `Bonus_points`, `Role`) VALUES ('$email','$pass','0', 'user')");
    $_SESSION['mess']= "Регистрация прошла успешно!";
    header('Location:authorization.php');
}



?>