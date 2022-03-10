<?php
require '../check_admin_login.php'; 
include_once "../header.php";
include_once "../sidebar.php";
include_once "../connect.php";
$order_id = $_GET["id"];
$sql = "SELECT * FROM order_product 
        join products on products.id=order_product.product_id
        where order_id = '$order_id'";
    $row=mysqli_query($connect,$sql);
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li>

                <a href="#">
                </a>
            </li>
            <li class="active">Tổng quan</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Quản lý đơn hàng <?php echo $order_id ?></h1>
        </div>

    </div>
    <table class="table table-striped">
        <thead>
        <tr>
        <tr>
<!--            <th scope="">ID</th>-->
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá</th>
            <th scope="col">Tổng sản phẩm</th>
        </tr>
        </tr>
        </thead>
        <tbody>
        <?php

        $sum =0;
        foreach ($row as $each) {
        ?>
        <tr>

            <td><?php echo $each["name"] ?></td>
            <td>
                <img height="100" src="../products/photo/<?php echo $each["photo"] ?>" alt="">
            </td>
            <td><?php echo $each["quantity"] ?></td>
            <td><?php echo $each["price"] ?></td>
            <td>
                <?php
                    $result =$each["quantity"] *  $each["price"];
                    echo ($result);
                    $sum += $result;
                ?>
            </td>


            <?php
            }
            ?>

        </tr>

        </tbody>

    </table>
    <h3 style="text-align: right">Tổng tiền đơn này là <?php echo $sum?></h3>

    <!--end main-->

    <?php
    include_once "../footer.php";
    ?>

