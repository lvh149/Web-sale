<?php
require '../check_admin_login.php'; 
include_once "../header.php";
include_once "../sidebar.php";
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
            <h1 class="page-header">Quản lý đơn hàng</h1>
        </div>

    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Thời gian đặt</th>
            <th>Người nhận</th>
            <th>Người đặt</th>
            <th>Trạng thái</th>
<!--            <th>Tổng tiền</th>-->
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once "../connect.php";
        $sql = "SELECT orders.*,customers.name,customers.address,customers.phone , order_status.name as status_name FROM orders
        JOIN customers
        ON customers.id = orders.customer_id 
        JOIN order_status
        ON order_status.id = orders.status
        ORDER BY orders.id DESC ";
        $row=mysqli_query($connect,$sql);
        foreach ($row as $each) {
        ?>
        <tr>
            <th scope="row"><?php echo $each["id"]?></th>
            <td><?php echo $each["created_at"]?></td>
            <td>
                <?php echo $each["receiver_name"]?>
                <br>
                <?php echo $each["receiver_phone"]?>
                <br>
                <?php echo $each["receiver_address"]?>
            </td>
            <td>
                <?php echo $each["name"]?>
                <br>
                <?php echo $each["phone"]?>
                <br>
                <?php echo $each["address"]?>
            </td>
            <td>
                <?php echo $each["status_name"]?>
            </td>
            <td>
                <?php if ($each["status"]==1 || $each["status"]==2) { ?>

                <a href="update.php?id=<?php echo $each["id"]?>&status=2"><button type="button" class="btn btn-primary">Duyệt</button></a>
                <a href="update.php?id=<?php echo $each["id"]?>&status=3"><button type="button" class="btn btn-success">Đã Giao</button></a>
                <a href="update.php?id=<?php echo $each["id"]?>&status=4"><button type="button" class="btn btn-danger">Hủy</button></a>
            
                 <?php  } ?>
            </td>
            <td>
                <a href="detail.php?id=<?php echo $each["id"]?>"><button type="button" class="btn btn-info">Xem</button></a>
                
            </td>
        </tr>
        <?php 
            }
            mysqli_close($connect);
        ?>
        </tbody>

    </table>


    <!--end main-->

    <?php
    include_once "../footer.php";
    ?>
