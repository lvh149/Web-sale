
<!--đăng nhập-->
<?php
    session_start();
    if(isset($_COOKIE['remember'])) {
        $token = $_COOKIE['remember'];
        require_once "connect.php";
        $sql="SELECT * FROM employees
            WHERE token='$token' ";
        $result =mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];
        $_SESSION['level'] = $each['levels'];
        header("location: ../admin/root/index.php");
    }
    if(isset($_SESSION['id'])) {
        header("location: ../admin/root/index.php");
        exit();
    }

    include_once "header_index.php";


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">

    <link href="css/styles.css" rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>

</body>
</html>
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Vietpro Mobile Shop - Administrator</div>
            <div class="panel-body">
                <div class="alert alert-danger">Tài khoản không hợp lệ !</div>
                <?php 
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
                <form role="form" method="post" action="process_signin.php">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" required placeholder="E-mail" name="email" id="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" required placeholder="Mật khẩu" name="password" id="password" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember" >Nhớ tài khoản
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="return check()">Đăng nhập</button>
                    </fieldset>
                </form>
                <script type="text/javascript">
                    function check(){
                        //email
                        let email=document.getElementById('email').value;
                        if(email.length===0){
                            document.getElementById('error_email').innerHTML="Email không được để trống";
                            check_error=true;
                        }else{
                            let regex_email=/^[A-Za-z0-9]+@[A-Za-z]+\.[a-z]+$/;
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
                        
                        }else{
                            document.getElementById('error_password').innerHTML='';
                        }


                        if(check_error){
                            return false;
                        }
                    }

                </script>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


