<?php 
session_start();
require 'check_login_cus.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        tr{
            text-align: center;
        }
    </style>
</head>
<body>  
    <?php include 'header.php' ?>
    <div id="div_giua">
        <table width="98%" border="1">
            <thead>
                <tr>

                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tổng tiền</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $order_id=$_GET['id'];
                include_once "../admin/connect.php";
                $sql = "select * from order_product
                join products on products.id = order_product.product_id
                where order_id = '$order_id' ";

                $row=mysqli_query($connect,$sql);
                foreach ($row as $each) {
                    ?>
                    <tr>
                        <td><?php echo $each['name'] ?></td>
                        <td><img height="100" src="../admin/products/photo/<?php echo $each['photo'] ?>"></td>                       
                        <td><?php echo $each['price'] ?></td>
                        <td><?php echo $each['quantity'] ?></td>

                        <td><?php echo $each['price']*$each['quantity'] ?></td>
                    </tr>
                <?php
                }
                ?>
                
                
        </tbody>

    </table>
    <a href="delete_order.php?id=<?php echo $order_id ?>"><h3>Huỷ đơn</h3></a>
</div>
<?php include 'footer.php' ?>

</body>
</html>


