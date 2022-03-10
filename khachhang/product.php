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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="div_tong">
		<?php include 'header.php' ?>
		<?php include 'id.php' ?>		
		<?php include 'footer.php' ?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

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
						alert('Thành công');
					}else{
						alert(response);
					}

				});

			});
			$(".btn-buy").click(function() {
				let id = $(this).data('id');
				$.ajax({
					url: 'add_to_cart.php',
					type: 'GET',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {id},
			})
				.done(function(response) {
					if (response == 1) {
						window.location = 'view_cart.php';
					}else{
						alert(response);
					}

				});

			});
		});

	</script>	
</body>
</html>