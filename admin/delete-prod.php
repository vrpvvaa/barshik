<?php
 include "../connect/connect.php";


$id = $_GET['id'];
$result = mysqli_query($con,"DELETE FROM `Product` WHERE `Id_product` = $id");
echo "<script>alert('Данные удалены!'); location.href = 'product-adm.php';</script>";
    ?>


