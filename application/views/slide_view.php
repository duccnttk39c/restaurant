<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quản lý slide</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body>
<?php include 'header_admin.php'; ?>
<div class="list_slide">
	<div class="container">

		<h1 class="text-xs-center mt-3 mb-2 display-3">Quản lý slides</h1>
		<hr>
		<div class="card-deck-wrapper mt-3">
			<div class="card-deck">
				<div class="row nhombaslide">

				<?php foreach ($mangketqua as $key => $value): ?>
					<div class="col-sm-4 motslide">
						<div class="card">
							<div class="card-block">
								<img src="<?= $value['slide_image'] ?>" alt="" class="img-fluid">
								<h5 class="card-title title_slide">Tiêu đề: <?= $value['title'] ?></h5>
								<p class="description_slide"><strong>Mô tả:</strong> <?= $value['description'] ?></p>
								<p class="link_slide"><strong>Link nút: </strong><?= $value['button_link'] ?></p>
								<p class="text_slide"><strong>Text nút: </strong><?= $value['button_text'] ?></p>
								<a href="<?= base_url() ?>Edit_slide" class="btn btn-warning">Sửa <i class="fa fa-pencil"></i></a>
								<a href="<?= base_url() ?>Slide/deleteSlide/<?= $value['id'] ?>" class="btn btn-danger">Xóa <i class="fa fa-remove"></i></a>
							</div>
						</div>
					</div>
				<?php endforeach ?>

				</div>	
			</div>
		</div>	
	</div>
</div>
<div class="addslide">
	<div class="container">
		<hr>
		<h1 class="text-xs-center mt-3 mb-3 display-4">Thêm mới slides</h1>

		<form action="Slide/addSlide" method="POST" enctype="multipart/form-data">
			<div class="form-group row">
				<div class="col-sm-6">
					<div class="row">
						<label class="col-sm-3 form-control-label text-xs-left">Id</label>
						<div class="col-sm-9">
							<input name="id" type="number" class="form-control" id="id">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="row">
						<label class="col-sm-3 form-control-label text-xs-left">Upload ảnh</label>
						<div class="col-sm-9">
							<input name="slide_image" type="file" class="form-control" id="slide_image">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-6">
					<div class="row">
						<label class="col-sm-3 form-control-labe text-xs-left">Tiêu đề slides</label>
						<div class="col-sm-9">
							<input name="title" type="text" class="form-control" id="title" placeholder="Tiêu đề">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="row">
						<label class="col-sm-3 form-control-label text-xs-left">Mô tả slides</label>
						<div class="col-sm-9">
							<input name="description" type="text" class="form-control" id="description" placeholder="Mô tả">
						</div>
					</div>
				</div>	
			</div>
			<div class="form-group row">
				<div class="col-sm-6">
					<div class="row">
						<label class="col-sm-3 form-control-label text-xs-left">Link của nút</label>
						<div class="col-sm-9">
							<input name="button_link" type="text" class="form-control" id="button_link" placeholder="Link nút">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="row">
						<label class="col-sm-3 form-control-label text-xs-left">Text của nút</label>
						<div class="col-sm-9">
							<input name="button_text" type="text" class="form-control" id="button_text" placeholder="Text nút">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row text-xs-center">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-success">Thêm mới</button>
					<button type="reset" class="btn btn-danger">Nhập lại</button>
				</div>
			</div>
		</form>	
	</div>
</div>
</body>
</html>