
<input type="search" name="search" id="search"  placeholder="Nhập tên điện thoại, máy tính, phụ kiện,... cần tìm"
style="width: 600px;height: 40px;border-radius: 2px;border: none;font-size: 14px;padding-left: 20px;">

<script type="text/javascript">
	$(document).ready(function() {
		$( "#search" ).autocomplete({
			minLength: 0,
			source: 'process_live_search.php',
			focus: function( event, ui ) {
				$( "#search" ).val( ui.item.label );
				return false;
			},
			select: function( event, ui ) {
				$( "#search" ).val( ui.item.label );
				window.location.href = 'http://localhost/do_an1-j2chool/khachhang/product.php?id='+ui.item.id
			}
		})
		.autocomplete( "instance" )._renderItem = function( ul, item ) {
			return $( "<li>" )
			.append(`<div>${item.label}<br><img src='../admin/products/photo/${item.photo}' height='50'>`)
			.appendTo( ul );
		};

	});
</script> 		



