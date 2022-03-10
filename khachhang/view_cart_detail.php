<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		tr{
			text-align: center;
		}
	</style>
	<link rel="stylesheet" href="style_order.css">
</head>
<body>
    <div id="div_giua">        
        <?php         
        require 'check_login_cus.php';
        if (empty($_SESSION['cart'])) { ?>
            <br>            
            <h1 align="center">
                <?php echo 'Không có sản phẩm trong giỏ hàng'; ?>             
            </h1>
            <br>
            <a href="index.php">
                <h3 align="center">
                    Quay lại trang chủ
                </h3>
            </a>
        <?php }else{ 	
           $cart = $_SESSION['cart'];
           $sum=0;
           ?>
           <table border="1" width="98%">
              <tr>
                 <th>Ảnh</th>
                 <th>Tên sản phẩm</th>
                 <th>Giá</th>
                 <th>Số lượng</th>
                 <th>Tổng tiền</th>
                 <th>Xoá</th>
             </tr>
             <?php foreach($cart as $id => $each){ ?>
                 <tr>
                    <td><img height="100" src="../admin/products/photo/<?php echo $each['photo'] ?>"></td>
                    <td><?php echo $each['name'] ?></td>

                    <td>
                        <span class="span-price">
                            <?php echo $each['price'] ?>
                        </span>
                    </td>
                    <td>
                    <button
                      class='btn-update-quantity'
                      data-id='<?php echo $id ?>'
                      data-type='0'
                    >
                      -
                    </button>
                    <span class="span-quantity">
                          <?php echo $each['quantity'] ?>
                    </span>
                    <button
                      class='btn-update-quantity'
                      data-id='<?php echo $id ?>'
                      data-type='1'
                      >
                      +
                    </button>


              </td> 			
              <td>
                <span class="span-sum">
                    <?php
                    $result = $each['price']*$each['quantity'];
                    echo $result;
                    $sum += $result;
                    ?>
                </span>

            </td>
            <td>
               <button
                  class='btn-delete'
                  data-id='<?php echo $id ?>'                 
                  >
                  X
                </button>
          </td>
      </tr>
  <?php } ?>
</table>
<h1>
	Tổng tiền hoá đơn:
	$
    <span id='span-total'>
        <?php echo $sum ?>
    </span>    
</h1>

<?php  
$id = $_SESSION['id_cus'];
require '../admin/connect.php';
$sql = "select * from customers where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>

<div class="wrap">
    <form class="login-form" method="post" action="process_checkout.php">
     <div class="form-header">
        <h3>Đặt hàng</h3>
        <?php if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        } ?>               
    </div>

    <div class="form-group">
        <input type="text" id="receiver_name" name="receiver_name" class="form-input" placeholder="Nhập tên người nhận" value="<?php echo $each['name'] ?>">
    </div>
    <div class="form-group">
        <span style="color: red;" id="error_name"></span>
    </div>
    
    <div class="form-group">
        <input type="text" id="receiver_phone" name="receiver_phone" class="form-input" placeholder="Nhập số điện thoại người nhận" value="<?php echo $each['phone'] ?>">
    </div>
    <div class="form-group">
        <span style="color: red;" id="error_phone"></span>
    </div>
    
    <div class="form-group">
        <input type="text" id="receiver_address" name="receiver_address" class="form-input" placeholder="Nhập địa chỉ người nhận" value="<?php echo $each['address'] ?>">
    </div>
    <div class="form-group">
        <span style="color: red;" id="error_address"></span>
    </div>
    
    <div class="form-group">
        <input type="text" id="note" name="note" class="form-input" placeholder="Nhập ghi chú" >
    </div>    
    <div class="form-group">                
        <button class="form-button" onclick="return check()">Đặt hàng</button>
    </div>    
</form>
</div><!--/.wrap-->
<script type="text/javascript">
    function check(){
        let check_error=false
        let name = document.getElementById('receiver_name').value;
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
        let phone = document.getElementById('receiver_phone').value;
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

        
        //Địa chỉ
        let address=document.getElementById('receiver_address').value;
        if(address.length===0){
            document.getElementById('error_address').innerHTML="Địa chỉ không được để trống";
            check_error=true;
        }else{
            document.getElementById('error_address').innerHTML="";
        }        

        if(check_error){
            return false;

        }
    }
</script>
<?php } ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-update-quantity").click(function() {
            let btn = $(this);
            let id = btn.data('id');
            let type = parseInt(btn.data('type'));
            $.ajax({
                url: 'update_quantity_in_cart.php',
                type: 'GET',
                // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                data: {id,type},
            })
            .done(function() {
                let parent_tr = btn.parents('tr');
                let price = parent_tr.find('.span-price').text();
                let quantity = parent_tr.find('.span-quantity').text();
                if(type == 1){
                    quantity++;
                }else{
                    quantity--;
                }
                if(quantity===0){
                    parent_tr.remove();
                    getTotal();                 
                }else{
                    parent_tr.find('.span-quantity').text(quantity);
                    let sum = price * quantity;
                    parent_tr.find('.span-sum').text(sum);
                }
                getTotal();                
                
            });            
        });
        $('.btn-delete').click(function(){
            let btn = $(this);
            let id = btn.data('id');
            $.ajax({
                url: 'delete_from_cart.php',
                type: 'GET',
                
                data: {id},
            })
            .done(function() {
                btn.parents('tr').remove();
                getTotal();

            });
        });
    });
    function getTotal(){
        let total =0;
        $(".span-sum").each(function() {
            total += parseFloat($(this).text());
        });
        $('#span-total').text(total);
        if(total ==0){
            location.reload();
        }
    }
</script>
</body>
</html>