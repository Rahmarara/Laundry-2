<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
</head>
<body>

	<div class="container">
		<div class="row justify-content-center mt-4">
			<div class="col-md-6">
				<?=form_open('login/aksi')?>
				<div class="card bg-info">
					<div class="card-header">
						<p class="text-center">Login</p>
					</div>
					<div class="card-body">
						<div class="form-group">
						<input type="text" name="username" placeholder="username" class="form-control" requried>
						</div>
						<div class="form-group">
							<input type="password" name="password" placeholder="password" class="form-control" required>
						</div>
					</div>
					<div class="card-footer">
						<div class="form-group">
							<button type="submit" class="btn btn-success">Masuk</button>
						</div>
					</div>
				</div>
				<?=form_close()?>
				<?php //if(!empty($this->session->flashdata('gagal'))){echo 'gagal';} ?>
			</div>
		</div>
	</div>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<!-- 
	RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

<?php if($this->session->flashdata('cek_login') == 'gagal'): ?>
<script>
alertify.error('Username atau Password salah');
</script>
<?php endif;?>
</body>
</html>