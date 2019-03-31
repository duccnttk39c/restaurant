<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quản lý danh mục tin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body>
<?php include 'header_admin.php'; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-6">
	        <div class="jumbotron jumbotron-fluid text-xs-center">
				<div class="container">
					<h1 class="">Quản lý danh mục</h1>
					<p class="lead">Form này cho phép thêm danh mục tin vào cơ sở dữ liệu</p>
					<hr class="m-y-md">
				</div>
			</div>
			<!-- <form action="news/addCateNews" method="POST"> -->
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Tên danh mục</label>
					<input name="name_catenews" type="text" class="form-control" id="name_catenews" placeholder="Tên danh mục tin">
				</fieldset>
				<fieldset class="form-group">
					<input type="button" class="form-control btn btn-success" id="nutthemdanhmuc" value="Thêm danh mục tin">
				</fieldset>
			<!-- </form> -->
		</div> <!-- end cot trai -->
		<div class="col-sm-6 cacdanhmuc">
			<div class="jumbotron jumbotron-fluid text-xs-center">
				<div class="container">
					<h1>Danh sách danh mục</h1>
					<p class="lead">Các danh mục tin đã thêm</p>
					<hr class="m-y-md">
				</div>
			</div>
			<?php foreach ($dulieu as $value): ?>
				
			<div class="card card-inverse card-primary mb-3 text-center"> 
			    <div class="card-block">
				    <div class="thaotac text-xs-right">
				    	<a data-href="<?php echo base_url(); ?>news/editCateNews/<?= $value['id']; ?>" class="nutedit btn btn-warning"> <i class="fa fa-pencil"></i></a>
				    	<a data-href="<?= $value['id']; ?>" class="nutxoa btn btn-danger"> <i class="fa fa-remove"></i></a>
				    </div>
				    <div class="jquery_button text-xs-right hidden-xs-up">
				    	 <a href="" class="btn btn-success nutluu"> Lưu </a>
				    </div>
				    <h4 class="card-blockquote">
			    		<fieldset class="form-group jquery_tendanhmuc hidden-xs-up">
			    			<input type="hidden" class="form-control id" value="<?= $value['id']; ?>">
			    			<input type="text" class="form-control tendanhmucsua" value="<?= $value['name_catenews']; ?>">
			    		</fieldset>
			    		<div class="noidung_ten">
			    			<?= $value['name_catenews']; ?>
			    		</div>
				    </h4>
				</div>
		   	</div>

			<?php endforeach ?>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>

<script>
	$(function() {

		$('body').on('click', '.nutedit', function(event) {

			$(this).parent().addClass('hidden-xs-up');
			$(this).parent().next().next().find('.noidung_ten').addClass('hidden-xs-up');
			$(this).parent().next().removeClass('hidden-xs-up');

			$(this).parent().next().next().find('.jquery_tendanhmuc').removeClass('hidden-xs-up');
			// sử dụng ajax để kết nối với controller cập nhật dữ liệu

			event.preventDefault();
 			/* Act on the event */
		});

		$('body').on('click', '.nutluu', function(event) {
			
			giatriten = $(this).parent().next().children('.jquery_tendanhmuc').children('.tendanhmucsua').val();
			giatriid = $(this).parent().next().children('.jquery_tendanhmuc').children('.id').val();

			phantu1 = $(this).parent().addClass('hidden-xs-up');
			phantu2 = $(this).parent().next().children('.jquery_tendanhmuc').addClass('hidden-xs-up');
			noidung = $(this).parent().next().children('.jquery_tendanhmuc').children('.tendanhmucsua').val();
			// cho hiện thị ra
			hienthi1 = $(this).parent().prev().removeClass('hidden-xs-up');
			hienthi2 = $(this).parent().next().children('.noidung_ten').html(noidung).removeClass('hidden-xs-up');

			$.ajax({
				url: duongdan + 'news/updateCateNews',
				type: 'POST',
				dataType: 'json',
				data: {
					name_catenews: giatriten,
					id: giatriid,
				},
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
			event.preventDefault();
 			/* Act on the event */
		});

		var duongdan = '<?php echo base_url() ?>';
		// bắt sự kiện click nút
		$('#nutthemdanhmuc').click(function(event) {
			/* Act on the event */
			
			$.ajax({
				url: duongdan + 'news/addJquery', // gửi đi controller xử lý 
				type: 'POST',
				dataType: 'json',
				data: {name_catenews:  $('#name_catenews').val()},
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function(res) {
				console.log(res);
				// dùng jquery add ra nội dung thêm mới
				noidung = '<div class="card card-inverse card-primary mb-3 text-center">';
				noidung+= '<div class="card-block">';
				noidung+= '<div class="thaotac text-xs-right">';
				noidung+= '<a data-href="'+res+'" class="nutedit btn btn-warning"> <i class="fa fa-pencil"></i></a>';
				noidung+= ' <a data-href="'+res+'" class="nutxoa btn btn-danger"> <i class="fa fa-remove"></i></a>';
				noidung+= '</div>';
				noidung+= '<h4 class="card-blockquote">'; 
				noidung+= '<div class="noidung_ten">';
				noidung+= $('#name_catenews').val();
				noidung+= '</div>';
				noidung+= '</h4';
				noidung+= '</div>';
				noidung+= '</div>';
	    
				$('.cacdanhmuc').append(noidung);
				$('#name_catenews').val('');
			});
			
		}); // hết jquery cho nút thêm mới
		// bắt đầu jquery cho nút xóa
		$('body').on('click', '.nutxoa', function(event) {
			
			idtin = $(this).data('href');
			doituongxoa = $(this).parent().parent().parent();
			$.ajax({
				url: duongdan + 'news/deleteCateNews/' + idtin,
				type: 'POST',
				dataType: 'json'
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
				// dùng jquery, xóa luôn phần tử, đỡ phải load lại
				doituongxoa.remove();
			});
		});
	});
</script>

</body>
</html>