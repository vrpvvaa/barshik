<?php

require ("connect/connect.php");
require ("connect/header.php");

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=Russo+One&display=swap"
        rel="stylesheet">
    <title>FIZZ</title>
</head>

<body>

    <main>
        <section>
            <h2 id="menu-header">Меню</h2>

            <div class="menu">
                <div class="row">
                    <div class="product">
                        <img src="" alt="Изображение позиции">
                        <h3>Коктейльчик</h3>
                        <h4>150₽</h4>
                        <button>Добавить <br> в корзину</button>
                    </div>

                    <div class="product">
                        <img src="" alt="Изображение позиции">
                        <h3>Название</h3>
                        <h4>Цена</h4>
                        <button>Добавить <br> в корзину</button>
                    </div>

                    <div class="product">
                        <img src="" alt="Изображение позиции">
                        <h3>Название</h3>
                        <h4>Цена</h4>
                        <button>Добавить <br> в корзину</button>
                    </div>
                </div>

                <div class="row">
                    <div class="product">
                        <img src="" alt="Изображение позиции">
                        <h3>Название</h3>
                        <h4>Цена</h4>
                        <button>Добавить <br> в корзину</button>
                    </div>

                    <div class="product">
                        <img src="" alt="Изображение позиции">
                        <h3>Название</h3>
                        <h4>Цена</h4>
                        <button>Добавить <br> в корзину</button>
                    </div>

                    <div class="product">
                        <img src="" alt="Изображение позиции">
                        <h3>Название</h3>
                        <h4>Цена</h4>
                        <button>Добавить <br> в корзину</button>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <?php include ("connect/footer.php"); ?>



</body>

</html>