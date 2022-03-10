<?php
require '../check_admin_login.php'; 
include_once "../header.php";
include_once "../sidebar.php";
include_once "../connect.php";
$sql = "SELECT * FROM manufactures";
$result = mysqli_query($connect,$sql);

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
            <h1 class="page-header">Quản lý sản phẩm</h1>
            <a href="index.php"><button type="button" class="btn btn-primary ">Danh sách</button></a>
        </div>

    </div>
    <?php   
    
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>

    <form  style="padding-top: 20px" method="post" action="process_create.php"  enctype="multipart/form-data">
        <div class="form-group">

            <input type="text" class="form-control" placeholder="Nhập tên" name="name" autofocus id="name">
            <span style="color:red" id="error_name"></span>
            <br>
            <label for="">Ảnh</label>
            <input type="file" name="photo" id="">
            <span style="color:red" id="error_photo"></span>
            <br>
            <input type="number" class="form-control"  placeholder="Nhập giá" name="price" id="price">
            <span style="color:red" id="error_price"></span>
            <br>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3"   name="desc" placeholder="Enter ..." id="desc"></textarea>
                <span style="color:red" id="error_desc"></span>
            </div>
<!--            <input type="number" class="form-control"  placeholder="Nhập danh mục" name="manu_id">-->
            <div class="form-group">
                <label>Nhà sản xuất</label>
                <select class="form-control" name="manu_id" id="manu_id">
                    <option value="-1">---Chọn---</option>
                    <?php foreach ($result as $each_manu) { ?>

                    <option value="<?php echo $each_manu["id"]?>"> <?php echo $each_manu["name"]?></option>

                    <?php } ?>
                </select>
            </div>
            <span style="color:red" id="error_manu_id"></span>
            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="menu_id" id="menu_id">
                    <option value="-1">---Chọn---</option>
                    <?php foreach ($result_menu as $each) { ?>

                        <option value="<?php echo $each["id"]?>"> <?php echo $each["name"]?></option>

                    <?php } ?>
                </select>
            </div>
            <span style="color:red" id="error_menu_id"></span>
        </div>

        <!--        <div class="form-check">-->
        <!--            <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
        <!--            <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
        <!--        </div>-->
        <button type="submit" class="btn btn-primary" onclick="return check()">Submit</button>
    </form>
    <script type="text/javascript">
        function check(){
            let check_error=false
            let name = document.getElementById('name').value;
            if(name.length===0){
                document.getElementById('error_name').innerHTML="Tên không được để trống";
                check_error=true;
            }else{
                let regex_name= /^[A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đa-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ0-9]*([ ][A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đa-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ0-9]*)*$/;
                if(!regex_name.test(name)){
                    document.getElementById('error_name').innerHTML="Tên không hợp lệ";
                    check_error=true;
                }else{
                    document.getElementById('error_name').innerHTML="";
                }
            }

            //gia tien
            
            let price = document.getElementById('price').value;
            if(price.length===0){
                document.getElementById('error_price').innerHTML="Giá tiền không được để trống";
                check_error=true;
            }else{
                let regex_price= /^[1-9][0-9]*$/;
                if(!regex_price.test(price)){
                    document.getElementById('error_price').innerHTML="Giá tiền không hợp lệ";
                    check_error=true;
                }else{
                    document.getElementById('error_price').innerHTML="";
                }
            }

            //mo ta
            let desc = document.getElementById('desc').value;
            if(desc.length===0){
                document.getElementById('error_desc').innerHTML="Mô tả không được để trống";
                check_error=true;
            }else{
                    document.getElementById('error_desc').innerHTML="";
            }
            

            //Nha san xuat
            let manu_id=document.getElementById('manu_id');
            if(manu_id.value == '-1'  ){
                document.getElementById('error_manu_id').innerHTML='Chọn nhà sản xuất';
                check_error=true;
                
            }else{
                document.getElementById('error_manu_id').innerHTML='';
                
            }

            //Danh mục
            let menu_id=document.getElementById('menu_id');
            if(menu_id.value == '-1'  ){
                document.getElementById('error_menu_id').innerHTML='Chọn danh mục';
                check_error=true;
                
            }else{
                document.getElementById('error_menu_id').innerHTML='';
                
            }

            if(check_error){
                return false;

            }
        }

    </script>

</div>

<?php

include_once "../footer.php";
?>
