<?php
session_start();

require ("../connect/connect.php");

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Админ. панель</title>
</head>

<body>

<nav>
        <a href="product-adm.php"></a>
        <a style="display:flex;"  id="logo-link" href="../index.php"><img style="align-self:center;" class="logo" src="../images/logo.png" alt="Лого"></a>
        <a href="../reg-auth/exit.php">Выйти</a>
    </nav>

<main>
    <section>
        <div class="admin-greet">

        <h2>Добро пожаловать, админ!</h2>
        <h2>Выберите необходимую страницу :)</h2>

        <nav id="adm-nav">
            <a href="product-adm.php">Продукты</a>
            <a href="category-adm.php">Категории</a>
            <a href="order-adm.php">Заказы</a>
        </nav>


        </div>
    </section>
</main>

    <?php include ("../connect/footer.php"); ?>

</body>

</html>