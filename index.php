<?php

require ("connect/connect.php");
require ("connect/header.php");


$prods = mysqli_fetch_all(mysqli_query($con, "SELECT * FROM Product"));

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>FIZZ</title>
</head>

<body>

    <main>
        <section>
            <h2 id="menu-header">Меню</h2>

            <div class="menu">
                <div class="row">

                <?php foreach ($prods as $prod) { ?>
                    <div class="product">
                        <img src="images/<?=$prod[5]?>" alt="Изображение позиции">
                        <h3><?=$prod[1]?></h3>
                        <h4><?=$prod[4]?>₽</h4>
                        <a class="link-prod-buy" href="add_product.php?id=<?=$prod[0]?>">Добавить <br> в корзину</a>
                    </div>

                    <?php } ?>

                </div>


            </div>
        </section>
    </main>

    <?php include ("connect/footer.php"); ?>



</body>

</html>