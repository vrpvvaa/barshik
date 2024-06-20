<?php 

require_once "../connect/header.php";
require_once "../connect/connect.php";

$orders = mysqli_fetch_all(mysqli_query($con, "SELECT * From Orders"));

?>

    <main class="adm-editm">
        <section class="adm-edit">

        <div class="orders">

        <h2>Заказы</h2>

        
        <?php

foreach ($orders as $order) { ?>
<div class="cat-prod-ord-cont">

<h3>Заказ <?=$order[0]?></h3>

<form id="ord-form" method="post" action="ordADM.php">

<input type="hidden" name="id" value="<?=$order[0]?>">

<label for="user-id">ID клиента</label>
<input id="user-id" name="id_u" readonly type="text" value="<?=$order[1]?>">

<label for="date">Дата</label>
<input id="date" type="text" value="<?=$order[2]?>">

    <label for="status">Статус заказа</label>
    <select id="status" name="status">
  <option value="Готовим" <?php if ($order[3] === "Готовим") echo "selected"; ?> name = "status">Готовим</option>
  <option value="Доставка" <?php if ($order[3] === "Доставка") echo "selected"; ?> name = "status">Доставка</option>
  <option value="Выполнено" <?php if ($order[3] === "Выполнено") echo "selected"; ?> name = "status">Выполнено</option>
</select>

    <label for="bonus-u">Использованные баллы</label>
    <input type="text" value="<?=$order[5]?>">

    <label for="bonus-a">Полученные баллы</label>
    <input type="text" value="<?=$order[6]?>">

<input type="submit" value="Отправить">

</form>

</div>
        <?php } ?>

        


            </div>

        </section>
    </main>

    <?php include ("../connect/footer.php"); ?>

</body>

</html>