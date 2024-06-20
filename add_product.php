<?php
session_start();
require_once 'connect/connect.php';

$id_prod = $_GET["id"];
// var_dump($id_tovar);

$id_user = $_SESSION["user_id"];
$cart = mysqli_fetch_assoc(mysqli_query($con, "SELECT Content FROM `Basket` WHERE User_id = $id_user"));
// var_dump($cart);

if (is_null($cart)) {
    $compount[$id_prod] = 1;

    $compount = json_encode($compount);
    $sql = "INSERT INTO `Basket`( `User_id`, `Content`) VALUES ('$id_user','$compount')";
    // $_SESSION["message"] = "Товар добавлен в корзину";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $_SESSION["cart"] =
            mysqli_fetch_assoc(mysqli_query($con, "SELECT content FROM `Basket` WHERE User_id = $id_user"))["content"];
        header("location: /");
    }
}

$cart = $cart["Content"];
$cart = (array) json_decode($cart);

if (array_key_exists($id_prod, $cart)) {
    $cart[$id_prod]++;
   
}else{
    $cart[$id_prod] = 1;
}
var_dump($cart);
$compount = json_encode($cart);
$sql = "UPDATE `Basket` SET `Content`='$compount ' WHERE User_id = $id_user";
$result = mysqli_query($con, $sql);
if ($result) {
    $_SESSION["cart"] = $compount;
    $_SESSION["mess"] = "Товар добавлен в корзину";

    header("location: /");
}