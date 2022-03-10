<?php
require '../check_super_admin_login.php'; 
include_once "../header.php";
include_once "../sidebar.php";
include_once "../connect.php";
$sql = "SELECT * FROM employees";
$result= mysqli_query($connect,$sql);
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
            <h1 class="page-header">Thêm nhân viên</h1>
            <a href="index.php"><button type="button" class="btn btn-primary ">Danh sách</button></a>
        </div>

    </div>

    <?php  
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>

    <form  style="padding-top: 20px" method="post" action="process_create.php">
        <div class="form-group">
            <label for="">Tên:</label>
            <input type="text" class="form-control"  placeholder="Nhập tên" name="name" id="name">
            <span style="color: red;" id="error_name"></span>
            <br>
            <label for="">SDT:</label>
            <input type="text" class="form-control"  placeholder="Nhập tên" name="phone" id="phone">
            <span style="color: red;" id="error_phone"></span>
            <br>
            <label for="">Giới tính:</label>
            <input type="radio"  name="gender" id="gender" value="1">Nam
            <input type="radio"  name="gender" id="gender" value="0">Nữ
            <br>
            <span style="color: red;" id="error_gender"></span>
            <br>

            <label for="">Email:</label>
            <input type="email" class="form-control"  placeholder="Nhập tên" name="email" id="email">
            <span style="color: red;" id="error_email"></span>
            <br>
            <label for="">Mật khẩu:</label>
            <input type="password" class="form-control"  placeholder="Nhập tên" name="password" id="password">
            <span style="color: red;" id="error_password"></span>
            <br>
            <label for="">Địa chỉ:</label>
            <input type="text" class="form-control"  placeholder="Nhập tên" name="address" id="address">
            <span style="color: red;" id="error_address"></span>
            <br>

            <label>Danh mục</label>
            <select class="form-control" name="level" id="level">
                <option>---Chọn---</option>
                <?php foreach ($result as $each) { ?>
                    <option value="<?php echo $each["levels"]?>">
                        <?php if($each["levels"]==0) {?>
                            Quản Lý

                        <?php } else echo "Nhân viên"?>
                    </option>

                <?php } ?>
            </select>
            <span style="color: red;" id="error_level"></span>

        </div>
        <div class="form-group">

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
                let regex_name= /^[A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*([ ][A-ZÀ|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ì|Í|Ị|Ỉ|Ĩ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ỳ|Ý|Ỵ|Ỷ|Ỹ|Đ][a-zà|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ì|í|ị|ỉ|ĩ|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ỳ|ý|ỵ|ỷ|ỹ]*)*$/;
                if(!regex_name.test(name)){
                    document.getElementById('error_name').innerHTML="Tên không hợp lệ";
                    check_error=true;
                }else{
                    document.getElementById('error_name').innerHTML="";
                }
            }

            //sdt
            let phone = document.getElementById('phone').value;
            if(phone.length===0){
                document.getElementById('error_phone').innerHTML="Số điện thoại không được để trống";
                check_error=true;
            }else{
                let regex_phone= /^(\+84|0)[1-9]{9}$/;
                if(!regex_phone.test(phone)){
                    document.getElementById('error_phone').innerHTML="Số điện thoại bao gồm 10 số bắt đầu bằng 0 hoặc +84";
                    check_error=true;
                }else{
                    document.getElementById('error_phone').innerHTML="";
                }
            }

            //gioi tinh
            let gender=document.getElementsByName('gender');
            let check_gender=false;
            for(let i=0;i<gender.length;i++){
                if(gender[i].checked){
                    check_gender=true;
                }
            }
            if(check_gender==false){
                document.getElementById('error_gender').innerHTML='Giới tính không được để trống';
                check_error=true;
            }else{
                document.getElementById('error_gender').innerHTML="";
            }

            //email
            let email=document.getElementById('email').value;
            if(email.length===0){
                document.getElementById('error_email').innerHTML="Email không được để trống";
                check_error=true;
            }else{
                let regex_email=/^[A-Za-z0-9]+@[A-Za-z]+\.[a-z]+$/
                if(!regex_email.test(email)){
                    document.getElementById('error_email').innerHTML='Email không hợp lệ';
                }else{
                    document.getElementById('error_email').innerHTML='';
                }
            }
            
            //mật khẩu
            let password=document.getElementById('password').value;
            if(password.length===0){
                document.getElementById('error_password').innerHTML="Mật khẩu không được để trống";
                check_error=true;
            }else if(password.length <6){
                document.getElementById('error_password').innerHTML="Đặt cái mật khẩu dài hơn 6 ký tự đê";
                check_error=true;
            }else{
                document.getElementById('error_password').innerHTML='';
            }

            
            //Địa chỉ
            let address=document.getElementById('address').value;
            if(address.length===0){
                document.getElementById('error_address').innerHTML="Địa chỉ không được để trống";
                check_error=true;
            }else{
                document.getElementById('error_address').innerHTML="";
            }

            //Chức vụ
            let level=document.getElementById('level');
            if(level.value == '---Chọn---'  ){
                document.getElementById('error_level').innerHTML='Chọn chức vụ';
                check_error=true;
                
            }else{
                document.getElementById('error_level').innerHTML='';
                
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
