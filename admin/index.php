<?php
require ("../connect/"); 
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
        <a href="product-adm.php">Зарегистрироваться</a>
        <a id="logo-link" href="../index.php"><img class="logo" src="../images/logo.png" alt="Лого"></a>
        <a href="../connect/exit.php">Выйти</a>
    </nav>

<main>
    <section>
        <div class="admin-greet">

        <h2>Добро пожаловать, админ!</h2>
        <h2>В меню навигации выберите необходимую страницу страницу :)</h2>


        </div>
    </section>
</main>

    <?php include ("../connect/footer.php"); ?>

</body>

</html>