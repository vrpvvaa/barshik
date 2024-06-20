<?php

session_start();

if (isset($_SESSION["messaa"])) {
    $mes = $_SESSION["mess"];
    echo "<script>alert('$mes')</script>";
    unset($_SESSION["mess"]);
}

$check = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=Russo+One&display=swap"
        rel="stylesheet">
    <title>FIZZ</title>
</head>

<body>

    <nav>
        <a id="logo-link" href="../index.php"><img class="logo" src="../images/logo.png" alt="Лого"></a>
        <div class="reg-auth-links" style="display:flex;flex-direction:row-reverse; gap:20px;">
            <?php if ($check) {
                if ($_SESSION["role"] == "user") { ?>

                    <a href="../reg-auth\exit.php">Выйти</a>
                    <a href="../user/"><img id="login" src="../images/login.png" alt="Войти"></a>
                    <a href="../cart.php">Корзина</a>
                <?php } else { ?>
                    <a href="../admin/"><img id="login" src="../images/login.png" alt="Войти"></a>
                    <a href="../reg-auth\exit.php">Выйти</a>

                <?php }
            } else { ?>
                <a href="../reg-auth/authorization.php"><img id="login" src="../images/login.png" alt="Войти"></a>
            <?php } ?>
        </div>
    </nav>