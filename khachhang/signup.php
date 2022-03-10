
<?php
if (isset($_SESSION['error'])) {
	echo $_SESSION['error'];
	unset($_SESSION['error']);
}
?> 

<div id="modal-signup" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class='modal-header'>
            <h1>Đăng ký</h1>
            <div class="alert alert-danger" id="div-error" style="display: none;">

            </div>
        </div>
        <div class='modal-body'>
            <div class="wrap">
                <form class="login-form" method="post" id="form-signup">                
                    <!--Email Input-->
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="form-input" placeholder="Nhập tên">
                    </div>

                    <!--Password Input-->
                    <div class="form-group">
                        <input type="text" id="phone" name="phone" class="form-input" placeholder="Nhập số điện thoại">
                    </div>

                    <div class="form-group">
                        <span style="font-weight: 350;">Giới tính:</span>
                        <input type="radio" name="gender" value="1"><span style="font-weight: 350;">Nam</span>
                        <input type="radio" name="gender" value="0"><span style="font-weight: 350;">Nữ</span>
                    </div>

                    <div class="form-group">
                        <input type="text" id="address" name="address" class="form-input" placeholder="Nhập địa chỉ">
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-input" placeholder="email@example.com">
                    </div>

                    <!--Password Input-->
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-input" placeholder="password">
                    </div>
                    <!--Login Button-->
                    <div class="form-group">                
                        <button class="form-button">Đăng ký</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {       
        $("#form-signup").validate({            
            rules: {
                "name": {
                    required: true,
                    maxlength: 15
                }, 
                "email": {
                    required: true,
                    email:true
                },

                "password": {
                    required: true,
                    minlength: 8
                },
                "re-password": {
                    equalTo: "#password",
                    minlength: 8
                },
                "password": {
                    required: true,
                    minlength: 8
                },
            },
            messages: {
                "name": {
                    required: "Bắt buộc nhập tên",
                    maxlength: "Hãy nhập tối đa 15 ký tự"
                },
                "email": {
                    required: "Bắt buộc nhập email",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                },
                "password": {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                },
                "re-password": {
                    equalTo: "Hai password phải giống nhau",
                    minlength: "Hãy nhập ít nhất 8 ký tự"
                }
            },
            submitHandler:function(){
                $.ajax({
                    url: 'process_signup.php',
                    type: 'POST',
                    dataType: 'html',
                    data: $("#form-signup").serializeArray(),
                })
                .done(function(response) {
                    if(response !== '1'){
                        $("#div-error").text(response);
                        $("#div-error").show();
                    }else{
                        $("#modal-signup").toggle();
                        $(".modal-backdrop").hide();
                        $(".menu-cus").show();
                        $("#span-name").text($("input[name='name']").val());
                        $(".menu-guest").hide();
                    }
                });
            }
        });

    });
</script>

