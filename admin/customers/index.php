<?php
require '../check_admin_login.php'; 
include_once "../header.php";
include_once "../sidebar.php";
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <!--/.row-->

    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Thông tin khách hàng</h1>
        </div>

    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th>Giới tính</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once "../connect.php";
        $sql = "SELECT * FROM customers   ";
        $row=mysqli_query($connect,$sql);
        foreach ($row as $each) {
        ?>
        <tr>
            <th scope="row"><?php echo $each["id"]?></th>
            <td><?php echo $each["name"]?></td>
            <td>
                <?php if($each["gender"]==0) {?>
                    Nữ

                <?php } else echo "Nam"?>

            </td>
            <td><?php echo $each["phone"]?></td>
            <td><?php echo $each["email"]?></td>
            <td>  
                <a href="delete.php?id=<?php echo $each["id"]?>"><button type="button" class="btn btn-danger">Xóa</button></a>
            </td>

        </tr>
        <?php }
            mysqli_close($connect);
        ?>
        </tbody>

    </table>


    <!--end main-->

    <?php
    include_once "../footer.php";
    ?>
