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
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý sản phẩm</h1>
            <a href="create.php"><button type="button" class="btn btn-primary">Thêm</button></a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="">ID</th>
                <th scope="col">Tên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Nhà sản xuất</th>
                <th scope="col">Xem chi tiết</th>
                <th>Thao tác</th>

            </tr>
        </thead>
        <tbody>
            <?php
            include_once "../connect.php";
            $sql = "SELECT
            products.*,
            manufactures.name as manufacture_name,
            menu.name as menu_name
            FROM products
            JOIN manufactures ON products.manufacturer_id  = manufactures.id
            JOIN menu ON products.menu_id = menu.id 
            ORDER BY products.id DESC ";
            $row=mysqli_query($connect,$sql);
            foreach ($row as $each) {
        ?>
            <tr>
                <th scope="row"><?php echo $each["id"] ?></th>
                <td><?php echo $each["name"] ?></td>
                <td>
                    <img height="100" src="photo/<?php echo $each["photo"] ?>" alt="">
                </td>
                <td><?php echo $each["price"] ?></td>
                <td><?php echo $each["menu_name"] ?></td>
                <td><?php echo $each["manufacture_name"] ?></td>
                <td><a href="">Chi tiết</a></td>
                <td>
                    <a href="update.php?id=<?php echo $each["id"]?>"><button type="button" class="btn btn-info">Sửa</button></a>
                    <a href="delete.php?id=<?php echo $each["id"]?>"> <button type="button" class="btn btn-danger">Xóa</button></a>
                </td>
                <?php
                }
            ?>

            </tr>
        </tbody>

    </table>

    <!--end main-->

<?php
    include_once "../footer.php";
    ?>

