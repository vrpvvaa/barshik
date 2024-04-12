<?php
include ("../connect/header.php");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=Russo+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Авторизация</title>
</head>

<body>

    <div class="reg-cont">

        <div class="reg-inside">

            <h2>Вход</h2>

            <form class="form-user" id="formAUTHORIZ" action="authDB.php" method="post">
                <label for="email">Эл. почта</label>
                <input class="data-input" id="email" name="email" type="email" placeholder="Введите эл. почту">

                <label for="password">Пароль</label>
                <input class="data-input" id=" password" name="pass" type="password" placeholder="Введите пароль">

                <input id="button-form" type="submit" value="Войти">
            </form>

            <div class="sign-in">
                <p>Вы здесь впервые?</p> <a href="registration.php">Зарегистрироваться</a>
            </div>
        </div>
    </div>

    <?php include ("../connect/footer.php"); ?>


</body>

</html>