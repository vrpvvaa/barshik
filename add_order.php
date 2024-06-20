<?php
session_start();
require_once "connect/connect.php";

$id = $_SESSION["user_id"];
$prod = $_POST["prod"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];
$time = date("Y-m-d h:i:sa");


$sql=mysqli_query($con,"INSERT INTO `Orders`( `User_id`, `Date_of_order`, `Status`, `Total_price`, `Used_bonuses`, `Accrued_bonuses`) 
VALUES ($id,'$time','новый',$price, 1, 1)");
$_SESSION["mess"]="заказ оформлен";
header("Location: /");

