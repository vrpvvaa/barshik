<?php
include "connect/header.php";
include "connect/connect.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Корзина</title>
</head>

<body>
<main class="cart-main"> 
        <div class="container"> 
            <h2 class="text-personal-account">Корзина</h2> 
            <ul> 
                
                <table> 
                    <tr> 
                        <th>Товар</th> 
                        <th>Цена</th> 
                        <th>Количество</th> 
                    </tr> 
                    <?php 
                    $res = mysqli_fetch_all(mysqli_query($con, 'select * from basket INNER JOIN Product where User_id = ' . $_SESSION['user_id'])); 
                    $count = mysqli_fetch_assoc(mysqli_query($con, 'select content from basket INNER JOIN Product where User_id = ' . $_SESSION['user_id'])); 
                    $data = json_decode($count['content'], true); ?>
                          <form action="add_order.php" method="post">
                    <?php foreach ($res as $value) { 
                        $productId = $value["3"]; 
                        $quantity = $data[$productId]; 
                    ?> 
                    <tr> 
                  
                        <td> 
                            <input readonly name="prod" value = "<?= $value["4"] ?>"> 
                        </td> 
                        <td> 
                            <input readonly name="price" value ="<?= $value["7"] ?>" >
                        </td> 
                        <td> 
                            <input readonly name="quantity" value = "<?= $quantity ?>">
                        </td> 
                    </tr> 
                    <?php } ?> 
                </table> 
                <a href="delete-prod-basket.php?id=<?=$value["3"]?>">Очистить корзину</a>

            </ul> 
            <button type="submit">ОФОРМИТЬ ЗАКАЗ</button>
            </form>
        </div> 
    </main> 
    
<?php

require_once "connect/footer.php";

?>

</body>

</html>