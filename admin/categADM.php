<?php

include ("../connect/connect.php");

$name = isset($_POST["name"])?$_POST["name"]:false;

if($name) {
    $result = mysqli_query($con, "INSERT INTO `Category`(`Name`) VALUES ('$name')");
    if ($result) {
        echo "<script>alert('Категория создана');location.href = 'category-adm.php';
        </script>";
    } else {
        echo "<script>alert('Произошла ошибка');location.href = 'category-adm.php';
        </script>";

    }
    
}

?>