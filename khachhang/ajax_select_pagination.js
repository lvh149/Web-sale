<script type="text/javascript">
	$(document).ready(function(){
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

	})
</script>