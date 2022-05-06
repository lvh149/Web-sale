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
	<link rel="stylesheet" href="style2.css">
</head>
<body>
	<div id="div_tong">
		<?php include 'header.php' ?>
		<?php include 'manufacturer_detail.php' ?>		
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
			$("#slt-sort").change(function() {
			let order =$("#slt-sort").val();
			// alert(order);
			let name = "<?php echo $name ?>";
			let next_page = "<?php echo $next_page ?>";
			let page = <?php echo $page ?>;
			let url =window.location.href.split('/').pop();
			url=url.split('&').shift();
			url += "&sort="+order+"&page="+page;
			$.ajax({
				url: 'sort.php',
				type: 'POST',
				dataType: 'html',
				data: {order: order,name:name,next_page:next_page},
			})
			.done(function(response) {
				// $('.san_pham').remove();
				$('.test').html(response);
				window.history.pushState('', '', url); 
			})
			
		});
		$(".btn-next-page").click(function() {
			let order =$("#slt-sort").val();
			// alert(order);
			let name = "<?php echo $name ?>";
			let next_page = "<?php echo $next_page ?>";
			let page = $(this).data('id');
			let url =window.location.href.split('/').pop();
			url=url.split('&').shift();
			url += "&sort="+order+"&page="+page;
			$.ajax({
				url: 'sort.php',
				type: 'POST',
				dataType: 'html',
				data: {order: order,name:name,page:page},
			})
			.done(function(response) {
				// $('.san_pham').remove();
				$('.test').html(response);
				window.history.pushState('', '', url); 
			})
		});
		});

	</script>		
</body>
</html>