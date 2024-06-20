<?php

include ("../connect/connect.php");

session_start();

$id = isset($_POST["id"])?$_POST["id"]:false;

$status = isset($_POST["status"])?$_POST["status"]:false;

if($status) {
    $result = mysqli_query($con, "UPDATE `Orders` SET `Status`='$status' WHERE Id_order = $id ");
    if($result) {
        $_SESSION["mess"] = "Статус изменен";
        header("Location: order-adm.php");
    } else {
        $_SESSION["mess"] = "Статус неизменен";
        header("Location: order-adm.php");
    }
}

?>