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
	<link rel="stylesheet" href="style2.css">
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
                <th scope="">ID</th>
                <th scope="col">Thời gian đặt</th>
                <th scope="col">Thông tin người nhận</th>
                <th scope="col">Thông tin người đặt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Xem chi tiết</th>            

            </tr>
        </thead>
        <tbody>
            <?php            
            $id = $_SESSION['id_cus'];            
            $page = 1;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }

            require '../admin/connect.php';

            $sql_number = "select orders.*,
            customers.name,
            customers.phone,
            customers.address
            from orders 
            join customers
            on orders.customer_id = '$id' && customers.id = '$id'";
            $results = mysqli_query($connect,$sql_number);
            $number_results = mysqli_num_rows($results);


            $number_results_per_page = 8;
            $number_page = ceil($number_results / $number_results_per_page);
            $next_page = $number_results_per_page * ($page -1);

            $sql = "select orders.*,
            customers.name,
            customers.phone,
            customers.address
            from orders 
            join customers
            on orders.customer_id = '$id' && customers.id = '$id'
            limit $number_results_per_page offset $next_page";
            
            $result = mysqli_query($connect,$sql);
            foreach ($result as $each) {
                ?>
                <tr>
                    <th scope="row"><?php echo $each["id"] ?></th>
                    <td><?php echo $each["created_at"] ?></td>

                    <td>
                        <?php echo $each["receiver_name"] ?><br>
                        <?php echo $each["receiver_phone"] ?><br>
                        <?php echo $each["receiver_address"] ?><br>

                    </td>
                    <td>
                        <?php echo $each["name"] ?><br>
                        <?php echo $each["phone"] ?><br>
                        <?php echo $each["address"] ?><br>

                    </td>

                    <td>
                        <?php 
                        switch ($each['status']) {
                            case '1':
                            echo "Mới đặt";
                            break;
                            
                            case '2':
                            echo "Đã duyệt";
                            break;
                            case '3':
                            echo "Đã giao";
                            break;
                            case '4':
                            echo "Đã huỷ";
                            break;
                        }
                        ?>
                    </td>
                    <td><?php echo $each['total_price'] ?></td>
                </td>
                <td><a href="view_order_detail.php?id=<?php echo $each['id'] ?>">Chi tiết</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>

    </table>
    <br>
    <?php if($number_results >8){ ?>
    Trang
    <?php for($i=1; $i <=$number_page;$i++){ ?>
            <a href="view_order.php?page=<?php echo $i ?>">
               <button><?php echo $i ?></button>
            </a>
    <?php }} ?>
</div>
	<?php include 'footer.php' ?>
	
</body>
</html>