<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
</head>
<body>
	<div id="div_tong">
		<?php include 'header.php' ?>
		<?php include 'products.php' ?>		
		<?php include 'footer.php' ?>
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$(".btn-add-to-cart").click(function() {
				let id = $(this).data('id');
				$.ajax({
					url: 'add_to_cart.php',
					type: 'GET',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {id},
			})
				.done(function(response) {
					if (response == 1) {
						$.notify("Thêm vào giỏ hàng thành công", "success");
					}else{
						alert(response);
					}

				});

			});

		});

	</script>	
</body>
</html>