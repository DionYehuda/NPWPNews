<?php 
	require '../include/conn.php';
	require '../include/function.php';
	session_start();
	if(isset($_SESSION["login"]))
	{
		if($_SESSION["login"] === 'user')
		{
		header("Location: view/user.php");
		exit;
		}
		if($_SESSION["login"] === 'admin'){
			header("Location: view/admin.php");
		exit;
		}
	}
	$kategori = $_GET["kategori"];
	$query = "SELECT * FROM berita WHERE kategori='$kategori'";
	$result = $conn->query($query);
?>

<!DOCTYPE html>	
<html>
<head>
	<title>Home</title>
	<!-- Bootstrap -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://startbootstrap.com/template/small-business/"></script>
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
			td:hover{
				background-color: grey;
				border-radius:20px;
				color: white;
			}
			.sidenav {
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #111;
			overflow-x: hidden;
			transition: 0.5s;
			padding-top: 60px;
			}

			.sidenav a {
			padding: 8px 8px 8px 32px;
			text-decoration: none;
			font-size: 25px;
			color: #818181;
			display: block;
			transition: 0.3s;
			}

			.sidenav a:hover {
			color: #f1f1f1;
			}

			.sidenav .closebtn {
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 50px;
			}

			.sidenav h2 {
			padding: 8px 8px 8px 32px;
			text-decoration: none;
			font-size: 25px;
			color: #f1f1f1;
			display: block;
			transition: 0.3s;
			}

			@media screen and (max-height: 450px) {
			.sidenav {padding-top: 15px;}
			.sidenav a {font-size: 18px;}
			}
			.zoom {
				transition: transform .2s;
				margin: 0 auto;
			}

			.zoom:hover {
				-ms-transform: scale(1.05);
				-webkit-transform: scale(1.05);
				transform: scale(1.05); 
			}
			.sidenav a.active{
				color:white;
			}
			a{
				color:black;
			}
			a:hover{
				color:#f1f1f1;
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
					<li class="inactive"><a href="../view/login.php" style="cursor:pointer;"> Login </a></li>
					<li class="inactive"><a href="../view/register.php" style="cursor:pointer;"> Register</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<h2>Kategori</h2>
		<a href="../index.php">Home</a>
		<a href="kategori.php?kategori=Olahraga">Olahraga</a>
		<a href="kategori.php?kategori=Ekonomi">Ekonomi</a>
		<a href="kategori.php?kategori=Politik">Politik</a>
		<a href="kategori.php?kategori=Permainan">Permainan</a>
	</div>
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Kategori</span>
	<div class="container">
			<table id="example" class="table" style="width:100%">
				<tbody>
					<?php
						while($row = $result->fetch_assoc()) :
					?>
					<tr class="zoom">
                        <td><a href="../view/detail.php?nomor=<?= $row['nomor']; ?>"><h2> <?= $row['judul'] ?> </h2><h3><?= $row['kategori'] ?></h3><?= $row['penulis'] ?> (<?= $row['tanggal'] ?>)
						<br><img src="../img/<?= $row['gambar']?>" width="350px"></a></td>
					</tr>
					<?php
						endwhile;
						mysqli_free_result($result);
						mysqli_close($conn);
					?>
				</tbody>
			</table>
		</div>
	<script>
		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
		}
		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
		}
	</script>
</body>