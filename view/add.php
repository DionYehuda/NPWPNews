<?php
	require '../include/conn.php';
	require '../include/function.php';
	session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    else{
        if($_SESSION["login"] !== 'admin'){
            header("Location: user.php");
        }
    }

	if(isset($_POST["add"])){	
		if(add($_POST)>0){
			echo "<script>
                alert('Data Berhasil ditambah!!!');
				document.location.href = '../view/admin.php'
            </script>";	
		}
		else{
			echo "<script>
                alert('Data gagal ditambah!!!');	
            </script>";	
		}
	}
	
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Web</title>
		
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../assets/css/dataTables.bootstrap.min.css">
		<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
		
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
			#add{
				color: white;
				background-color: black;
				border: solid 1px black;
				border-radius: 5px;
				margin-top: 10px;
				padding: 5px 10px;
				transition: .2s;
			}
			#add:hover{
				background-color: white;
				border: solid 1px black;
				color:black;	
			}
		</style>
	</head>
	<body>
		<header>
		<nav class="navbar-inverse">	
			<div class="container-fluid">
				<div class="navbar-header">
					<h4 style="color:white">NPWPNews</h4>
				</div>
				<ul class="nav navbar-nav navbar-right ">
					<li class="inactive"><a href="../include/logout.php" style="cursor:pointer;"> Logout </a></li>
				</ul>
			</div>
		</nav>
		</header>
		
		<h1>Tambah Berita</h1><br><br>
		<form action="" method="post" id="editform" enctype="multipart/form-data">
			<ul>
				<li class="form">
					<label for="judul" id="label">Judul </label>
					<input type="text" class="input" name="judul" id="Judul" placeholder="Judul" autocomplete="off" required >
				</li>
				<li class="form">
					<label for="kategori" id="label">Kategori</label>
					<select id="kategori" name="kategori" class="input">
						<option value="Olahraga">Olahraga</option>
						<option value="Politik">Politik</option>
						<option value="Ekonomi">Ekonomi</option>
						<option value="Permainan">Permainan</option>
					</select>
				</li>
				<li class="form">
					<label for="penulis" id="label">Penulis </label>
					<input type="text" class="input" name="penulis" id="penulis" placeholder="Penulis" autocomplete="off" required>
				</li>
				<li class="form">
					<label for="konten" id="label">Konten</label>
					<textarea class="input" name="konten" rows="4" cols="50" placeholder="Konten" required></textarea>
				</li>
				<li class="form">
					<label for="tanggal" id="label">Tanggal Rilis </label>
					<input type="date" class="input" name="tanggal" id="tanggal" autocomplete="off" required>
				</li>
				<li class="form">
					<label for="gambar" id="label">Gambar </label>
					<input type="file" class="input" name="gambar" id="gambar" autocomplete="off"	>
				</li>
				<li class="form">
					<button type="submit" name="add" id="add">Tambah</button>
					<button type='reset' name='reset' id='cancel'><a href='admin.php'>Cancel</a></button>
				</li>
			</ul>
		</form>
	</body>
</html>


