<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sửa danh mục tin</title>
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
<div class="container">
	<div class="row">
		<div class="col-sm-6 push-sm-3">
	        <div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="">Sửa danh mục tin</h1>
					<p class="lead">Form này cho phép sửa danh mục tin</p>
				</div>
			</div>
			<form action="<?php echo base_url() ?>news/updateCateNews" method="POST">
				<?php foreach ($mangdl as $value): ?>
				
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Tên danh mục</label>
					<input type="hidden" name="id" value="<?= $value['id'] ?>">
					<input name="name_catenews" type="text" class="form-control" id="formGroupExampleInput" placeholder="Tên danh mục tin"value="<?= $value['name_catenews'] ?>">
				</fieldset>
				<fieldset class="form-group">
					<input type="submit" class="form-control btn btn-warning" value="Lưu">
				</fieldset>

				<?php endforeach ?>
			</form>
		</div> <!-- end cot trai -->
	</div>
</div>
</body>
</html>