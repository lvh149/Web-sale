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

		//giới tính
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
		
		//Địa chỉ
		let address=document.getElementById('address').value;
		if(address.length===0){
			document.getElementById('error_address').innerHTML="Địa chỉ không được để trống";
			check_error=true;
		}else{
				document.getElementById('error_address').innerHTML="";
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
		}else if(password.length <8){
			document.getElementById('error_password').innerHTML="Đặt cái mật khẩu dài hơn 8 ký tự đê";
			check_error=true;
		}else{
			document.getElementById('error_password').innerHTML='';
		}


		if(check_error){
			return false;

		}
	}

</script>