<?php

include "../connect/connect.php";
$id = isset($_POST['id'])?$_POST['id']:false;

$Name = isset($_POST['name'])?$_POST['name']:false;

$query_cat = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `Category` where `Category_id` = $id")); 

$check_update = false;

$query_update = " UPDATE `Category` SET ";

if ($query_cat["Name"] != $Name) {
    $query_update .= " Name = '$Name', ";
    $check_update = true;
}
if ($check_update) {
    $query_update = substr($query_update, 0, -2);
    $query_update .= " WHERE Category_id = $id";
    $result = mysqli_query($con, $query_update);
    if ($result) {
       var_dump($query_update);
        echo "<script>alert('Категория изменена');location.href = 'category-adm.php';
        </script>";
        }
} else {
    echo "<script>alert('Нечего обновлять');location.href = 'category-adm.php';
    </script>";
}
?>
