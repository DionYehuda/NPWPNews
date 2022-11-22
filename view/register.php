<?php
	require '../include/conn.php';
	require '../include/function.php';
	if(isset($_POST["register"]) ) {
		if(registrasi($_POST) > 0) 
		{
			echo "<script>
				alert('Anda telah berhasil di daftarkan!!');
			</script>";
			header("Location: login.php");
		}
	}
	else
	{
		echo mysqli_error($conn);
	}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <!-- Bootstrap -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Jquery -->
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
		<style>
			ul{
				list-style-type: none;
			}
			.form{
				margin-top: 10px;
				width: 100%;
			}
			#label{
				width: 30%
			}
			#register{
				color: white;
				background-color: black;
				border: solid 1px black;
				border-radius: 5px;
				margin-top: 10px;
				padding: 5px 10px;
				transition: .2s;
			}
			#register:hover{
				background-color: white;
				border: solid 1px black;
				color:black;	
			}
			#cancel{
				background-color: #990f02;
				border: solid 1px white;
				border-radius: 5px;
				margin-top: 10px;
				padding: 5px 10px;
				transition: .2s;
			}
			#cancel:hover{
				background-color: white;
				border: solid 1px #990f02;
			}
			a {
				color: white;
			}
			a:hover {
				color: #990f02;
			}
			.input{
				width: 450px;
				border: solid 1px #aaa;
				border-radius: 5px;
				padding: 5px 10px;
			}
			h1{
				text-align: center;
			}
			form{
				margin-left: 140px;
			}
		</style>
</head>
	<body>
		<header>
			<nav class="navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<h4 style="color:white"> NPWPNews </h4>
					</div>
				</div>
			</nav>
		</header>
		<h1>SIGN UP</h1><br><br>	
		<form action="" method="post" enctype="multipart/form-data">
			<ul>
				<li class="form">
					<label for="nama" id="label">Nama Lengkap</label>
					<input type="text" name="first_name" id="nama" placeholder="Nama Depan" required style="width:25%;" class="input">
					<input type="text" name="last_name" id="nama" placeholder="Nama Belakang" required style="width:25%" class="input"> 
				</li>
				<li class="form">
					<label for="username" id="label">Username/Email</label>
					<input type="text" name="username" id="username" placeholder="Username/Email" required style="width:50%;" class="input">
				</li>
				<li class="form">
					<label for="password" id="label">Password </label>
					<input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required style="width:50%;"class="input">
				</li>
				<li class="form">
					<label for="password2" id="label">Konfirmasi Password </label>
					<input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" autocomplete="off" required style="width:50%;" class="input">
				</li>
				<li class="form">
					<label for="birthdate" id="label">Tanggal Lahir</label>
					<input type="date" name="birthdate" id="birthdate" autocomplete="off" required style="width:25%;"class="input">
				</li>
				<li>
					<label for="sex" id="label">Jenis Kelamin</label>
					<input type="radio" name="sex" value="laki-laki">
					<label for="laki_laki" required style="width:10%;">Laki-laki</label>
					<input type="radio" name="sex" value="perempuan">
					<label for="perempuan" required style="width:10%;">Perempuan</label><br>
				</li>
				<li class="form">
					<label for="profile" id="label">Foto Profil </label>
					<input type="file" class="input" name="gambar" id="gambar" autocomplete="off">
				</li>
				<li class="form">
					<button type="submit" name="register" id="register">Register</button>
					<button type="cancel" name="cancel" id="cancel"><a href='../index.php'>Cancel</a></button>
				</li>
			</ul>
		</form>
	</body>
</html>