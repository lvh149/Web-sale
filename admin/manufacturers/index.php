<?php
require '../check_super_admin_login.php'; 
include_once "../header.php";
include_once "../sidebar.php";
include_once "../connect.php";
$sql = "SELECT * FROM menu";
$result_menu = mysqli_query($connect,$sql);
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
            <h1 class="page-header">Quản lý nhà sản xuất</h1>
            <a href="create.php"><button type="button" class="btn btn-primary">Thêm</button></a>
        </div>

    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th>Thuộc danh mục</th>
                <th>Thao tác</th>

            </tr>
        </thead>
        <tbody>
        <?php
            include_once "../connect.php";
            $sql = "SELECT * FROM manufactures ORDER BY id DESC ";
            $row=mysqli_query($connect,$sql);
            foreach ($row as $each) {
        ?>
            <tr>
                <th scope="row"><?php echo $each["id"]?></th>
                <td><?php echo $each["name"]?></td>
                <td><?php echo $each["menu_id"]?></td>
                <td>
                    <a href="update.php?id=<?php echo $each["id"]?>"><button type="button" class="btn btn-info">Sửa</button></a>
                    <a href="delete.php?id=<?php echo $each["id"]?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                </td>

        <?php }
            mysqli_close($connect);
            ?>

            </tr>
        </tbody>

    </table>


    <!--end main-->

    <?php
    include_once "../footer.php";
    ?>