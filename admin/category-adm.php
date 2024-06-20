<?php

include ("../connect/connect.php");

$categories = mysqli_fetch_all(mysqli_query($con, "SELECT 
    Category.category_id, 
    Category.name, 
    COUNT(Product.id_product) AS count
FROM 
    category
LEFT JOIN 
    Product
ON 
    Category.category_id = Product.category_id
GROUP BY 
    Category.category_id, 
    Category.name
"));

foreach ($categories as $categ) {
    print_r($categ);
}

// print_r($categories);

?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Категории</title>
</head>

<body>

    <nav>
        <a href="index.php">Админ. панель</a>
        <a style="display:flex;" id="logo-link" href="../index.php"><img style="align-self:center;" class="logo"
                src="../images/logo.png" alt="Лого"></a>
        <a href="../reg-auth/exit.php">Выйти</a>
    </nav>

    <main class="adm-editm">

        <h2>Категории</h2>


        <section class="adm-edit">


            <div class="categories">
                <h3>Список категорий</h3>

                <?php foreach ($categories as $categ): ?>

                    <div class="cat-prod-ord-cont">
                        <h4>Категория № <?= $categ[0]?> | Товаров: <?=$categ[2]?></h4>

                        <form action="update-categ.php" method="POST">
                            <input name="id" hidden type="text" value="<?= $categ[0] ?>">
                            <input name="name" type="text" value="<?= $categ[1] ?>">



                            <input type="submit" value="Сохранить">
                        </form>

                        <div class="categ-prod-cont">

                        <div class="categ-prod">
                        <?php
                $categoryTovar = "SELECT Product.* FROM Product INNER JOIN Category ON Category.Category_id = Product.Category_id WHERE Category.Category_id = $categ[0]";
                $categoryResult = mysqli_fetch_all(mysqli_query($con, $categoryTovar));

                foreach ($categoryResult as $product) {
                    echo $product[0]. " - ". $product[1]. "<br>";
                }

                ?>
                        </div>

                        </div>

                        <a href="delete-categ.php?id=<?= $categ[0] ?>">Удалить</a>

                    </div>

                <?php endforeach; ?>


            </div>

            </div>

            <div class="create">

                <h3>Создание категории</h3>
                <form action="categADM.php" method="POST">
                    <label for="name">Название</label>
                    <input id="name" name="name" type="text">

                    <input type="submit" value="Сохранить">

                </form>

            </div>
        </section>
    </main>

    <?php include ("../connect/footer.php"); ?>


</body>

</html>