<?php
if (isset($_SESSION['error'])) {
	echo $_SESSION['error'];
	unset($_SESSION['error']);
}

if (isset($_COOKIE['remember'])) {
	$token = $_COOKIE['remember'];
	require '../admin/connect.php';
	$sql = "select * from customers 
	where token = '$token' limit 1";
	$result = mysqli_query($connect,$sql);
	$number_rows = mysqli_num_rows($result);
	if (number_rows ==1) {
		$each = mysqli_fetch_array($result);
		$_SESSION['id_cus'] = $each['id'];
		$_SESSION['name_cus'] = $each['name'];
	}
	
}

if (isset($_SESSION['id_cus'])) {
	header('location:index.php');
	exit;
}
?>

<div id="modal-signin" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header'>
                <h1>Đăng nhập</h1>
                <div class="alert alert-danger" id="div-error" style="display: none;">

                </div>
            </div>
            <div class="modal-body">
                <div class="wrap">
                    <form class="login-form" method="post" id="form-signin">

                        <!--Email Input-->
                        <div class="form-group">
                            <input type="email" name="email" class="form-input" placeholder="email@example.com">
                        </div>
                        <!--Password Input-->
                        <div class="form-group">
                            <input type="password" name="password" class="form-input" placeholder="password">
                        </div>
                        <div class="form-group">
                            Ghi nhớ đăng nhập
                            <input type="checkbox" name="remember">
                        </div>
                        <!--Login Button-->
                        <div class="form-group">                
                            <button class="form-button">Đăng nhập</button>
                        </div>
                        <div class="form-footer">
                            Bạn chưa có tài khoản? <a data-toggle='modal' data-target="#modal-signup" data-dismiss="modal">Đăng ký</a>
                        </div>
                        <div class="form-footer">
                         <a href="forgot_password.php">Quên mật khẩu</a>
                     </div>
                 </form>
             </div><!--/.wrap-->
         </div>
     </div>
 </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {       
        $("#form-signin").validate({            
            rules: {                 
                "email": {
                    required: true,
                    email:true
                },

                "password": {
                    required: true,
                    minlength: 8
                },
                
            },
            messages: {                
                "email": {
                    required: "Bắt buộc nhập email",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                },
                "password": {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                },

            },
            submitHandler:function(){
                $.ajax({
                    url: 'process_signin.php',
                    type: 'POST',
                    dataType: 'html',
                    data: $("#form-signin").serializeArray(),
                })
                .done(function(response) {
                    if(response !== '1'){
                        $("#div-error").text(response);
                        $("#div-error").show();
                    }else{

                        $("#modal-signin").toggle();
                        $(".modal-backdrop").hide();                        
                        $(".menu-guest").hide();
                        $(".menu-cus").show();
                        location.reload(); //k hien session[name] nen phai load lai trang :((((((((((
                    }
                });
            },
            
        });

    });
</script>






