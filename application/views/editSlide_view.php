<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sửa slide</title>
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
<div class="addslide">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 push-sm-3"> 
				<h3 class="display-4 text-xs-center mt-2 mb-2">Sửa slide</h3>		
				<?php $dem = 0; ?>		
				<form action="Slide/editSlide" method="POST" enctype="multipart/form-data">
					<?php foreach ($mangdl as $key => $value): ?>
					<?php $dem++; ?>
					<h2>Slide số <?= $dem; ?></h2>
					<hr>
					<fieldset class="form-group">
						<input type="hidden" name="id[]" class="form-control" id="id" value="<?= $value['id'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Tiêu đề slides</label>
						<input type="text" name="title[]" class="form-control" id="title" value="<?= $value['title'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Mô tả slides</label>
						<input type="text" name="description[]" class="form-control" id="description" value="<?= $value['description'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Link của nút</label>
						<input type="text" name="button_link[]" class="form-control" id="button_link" value="<?= $value['button_link'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Text của nút</label>
						<input type="text" name="button_text[]" class="form-control" id="button_text" value="<?= $value['button_text'] ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Upload ảnh</label>
						<img src="<?= $value['slide_image'] ?>" alt="" width="40%">
						<input type="hidden" name="slide_image_old[]" class="form-control" id="slide_image_old" value="<?= $value['slide_image'] ?>">
						<input type="file" name="slide_image[]" >
					</fieldset>
					<?php endforeach ?>
					<fieldset class="form-group">
						<input type="submit" class="form-control btn btn-warning" value="Lưu">
					</fieldset>
				</form>	
			</div>
		</div>	
	</div>
</div>
</body>
</html>