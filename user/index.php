
<?php 
include("../connect/header.php");
include("../connect/connect.php");


session_start();
if(isset( $_SESSION["mess"])){
    $mes = $_SESSION["mess"];
    echo "<script>alert('$mes')</script>";
    unset( $_SESSION["mess"]);
}

// После успешной аутентификации пользователя
$id = $_SESSION['user_id'];
$queryUserInfo = mysqli_fetch_all(mysqli_query($con,"SELECT * from `Users` where User_id = $id"));
$userInfo = mysqli_fetch_all(mysqli_query($con ,"select * from `Users` where User_id = $id" ));
$orderInfo = mysqli_fetch_all(mysqli_query($con ,"select * from `Orders` where User_id = $id" ));

if (isset($_POST['review_submit'])) {
    $orderId = $_POST['order_id'];
    $reviewText = $_POST['review_text'];

    // Вставляем отзыв в базу данных
    $query = "UPDATE `Orders` SET `comment` = '$reviewText' WHERE `Id_order` = '$orderId'";
    $result = mysqli_query($con, $query);

    // После добавления отзыва обновляем $orderInfo
    $orderInfo = mysqli_fetch_all(mysqli_query($con, "SELECT * FROM Orders WHERE User_id = $id" ));
}

?>

<main>
    <section>
        <div class="container" style="display:flex;gap:20px;">
            <div class="img">
                <img style="width:200px; height:200px;" src="..\images\pfp.jpg" alt="">
            </div>

            <div class="column-lk" style="display:flex;flex-direction:column; gap:20px;">

                <h1>Здравствуйте, <br> email!</h1>
                
                <form action="" style="display:flex; flex-direction:column;">
                    <label for="email">Почта</label>
                    <input required type="email" id="email">
                    <input type="submit" value="Сохранить">
                </form>
            </div>
            </div>

<div class="orders" style="margin: 20px 0 0 0;">
    <h2>Заказы</h2>

    <table>
                            <thead>
                                <tr>
                                    <th>Заказ</th>
                                    <th>Дата</th>
                                    <th>Состав заказа</th>
                                    <th>Сумма</th>
                                    <th>Статус</th>
                                    <th>Отзыв</th>
                                    <th>Оставить отзыв</th>

                                </tr>
                            </thead>
                            <?php
                                foreach($orderInfo as $value){
                                $infoProduct=mysqli_fetch_all(mysqli_query($con,"SELECT * FROM OrderProduct 
                                INNER JOIN Orders ON OrderProduct.Id_order = Orders.Id_order
                                INNER JOIN Product ON Product.Id_product = OrderProduct.Id_product 
                                where Orders.Id_order =$value[0] and Orders.User_id = $id"));

                                $sql = "SELECT * FROM OrderProduct 
                                INNER JOIN Orders ON OrderProduct.Id_order = Orders.Id_order
                                INNER JOIN Product ON Product.Id_product = OrderProduct.Id_product 
                                where Orders.Id_order =$value[0] and Orders.User_id = $id";

                                print_r($infoProduct);



                                ?>
                                <tr>
                                <td>№<?=$value[0]?></td>
                                <td><?=$value[2]?></td>
                            <?php
                                foreach($infoProduct as $product) { print_r($product);?>

                            <!-- <p><?=$product[12]?><?=$product[3]?> шт</p> -->
                        

                        </td> 
                        <!-- <?php var_dump($infoProduct) ?> -->
                        <td><?=$product[13]?> </td>
                        <td><?=$product[8]?> р</td>
                        <?php } ?>
                        <td><?=$value[3]?></td>
                                <td><?=$value[7]?></td>
                                <td>
                                <?php if ($value[3] == "Готов"): ?> 
                        <!-- Ведите отзыв -->
                                <form method="post" action="">
                                <a href=""   data-bs-toggle="modal" data-bs-target="#feedback" ><img src="images\writing.png" alt="" class="img-writing"></a></td>
                                <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <input type="hidden" name="order_id" value="<?= $value[0] ?>">

                                        <h5 class="modal-title" id="exampleModalLabel">Оставьте отзыв</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label" >Сообщение:</label>
                                            <textarea class="form-control" id="message-text" name="review_text"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="review_submit">Оставить отзыв</button>
                                            </div>
                                    </div>
                                    
                                    </div>
                                </div>
                                </div>
                            </form>
                                <?php else: ?> 
                                        Заказ не выполнен
                                    <?php endif; ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

</div>

    </section>
</main>

<?php include("../connect/footer.php");?>
</body>
</html>