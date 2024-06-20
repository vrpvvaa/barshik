<?php

include "..\connect\connect.php";

$prods = mysqli_fetch_all(mysqli_query($con, "SELECT * FROM `Product`"));

$categoryResult = mysqli_fetch_all(mysqli_query($con, "SELECT * FROM Category"));

print_r($prods);

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Продукты</title>
</head>

<body>

    <nav>
        <a href="index.php">Админ. панель</a>
        <a style="display:flex;" id="logo-link" href="../index.php"><img style="align-self:center;" class="logo"
                src="../images/logo.png" alt="Лого"></a>
        <a href="../reg-auth/exit.php">Выйти</a>
    </nav>

    <main class="adm-editm">

        <h2>Продукты</h2>

        <section class="adm-edit">

            <div class="products">

                <h3>Список продуктов</h3>

                <?php foreach ($prods as $prod) { ?>


                    <div class="cat-prod-cont">

                        <h3>Продукт <?= $prod[0] ?></h3>

                        <form id="product-form" action="update-prod.php" method="POST">
                            <input hidden name="id" type="text" value="<?= $prod[0] ?>">

                            <label for="name">Название продукта</label>
                            <input id="name" name="name" type="text" value="<?= $prod[1] ?>">

                            <label for="descr">Описание</label>
                            <input id="descr" name="descr" type="text" value="<?= $prod[2] ?>">

                            <label for="categ">Категория</label>
                            <select name="categ" id="categ">
                                <?php foreach ($categoryResult as $categoryItem): ?>
                                    <option value="<?= $categoryItem[0] ?>" <?= $categoryItem[0] == $prod[3] ? 'selected' : '' ?>>
                                        <?= $categoryItem[1] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <label for="price">Цена</label>
                            <input id="price" name="price" type="text" value="<?= $prod[4] ?>">

                            <input type="submit" value="Сохранить">
                        </form>

                        <a href="delete-prod.php?id=<?=$prod[0]?>">Удалить</a>

                    </div>

                <?php } ?>

            </div>

            <div class="create">

                <h3>Создание продукта</h3>

                <form action="prodADM.php" method="POST" enctype="multipart/form-data">
                    <label for="name">Название</label>
                    <input id="name" name="name" type="text">

                    <label for="descr">Описание</label>
                    <input id="descr" name="descr" type="text">

                    <label for="categ">Категория</label>
                    <select name="categ" id="categ">
                        <?php

                        foreach ($categoryResult as $categoryItem): ?>
                            <option value="<?= $categoryItem[0] ?>"> <?= $categoryItem[1] ?></option>
                        <?php endforeach; ?>

                        ?>
                    </select>

                    <label for="price">Цена</label>
                    <input id="price" name="price" type="number">

                    <label for="image">Изображение</label>
                    <input type="file" id="image" name="image" accept="image/*">

                    <input type="submit" value="Сохранить">

                </form>

            </div>





        </section>
    </main>

    <?php include ("../connect/footer.php"); ?>


</body>

</html>