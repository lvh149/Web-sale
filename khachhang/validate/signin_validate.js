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