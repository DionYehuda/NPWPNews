<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    else{
        if($_SESSION["login"] !== 'admin'){
            header("Location: ../index.php");
        }
    }
    require '../include/conn.php';
    require '../include/function.php';
    $query = "SELECT * FROM berita";
	$result = $conn->query($query);
?>


<!DOCTYPE html>	
<html>
<head>
	<title> Login</title>
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
		<script src="https://www.google.com/recaptcha/api.js"></script>
        <style>
			.container{
				margin-top: 30px;
				width: 90%;
			}
			button{
				color: white;
				background-color: black;
				border: solid 1px black;
				border-radius: 5px;
				padding: 5px;
				margin-bottom: 30px;
				float: right;
			}
			button:hover{
				color: white;
				background-color: #2a9df4;
				border: solid 1px #2a9df4;	
			}
			span{
				color: #2a9df4;
			}
			span:hover{
				color: black;	
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
    <div class="container">
			<a href="add.php"><button><span class="glyphicon glyphicon-plus" style="color:white"></span>Berita</button></a>
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Gambar</th>
						<th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Konten</th>
                        <th>Tanggal</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($row = $result->fetch_assoc()) :
					?>
					<tr>
                        <td> <?= $row['nomor'] ?> </td>
						<td><img src="../img/<?= $row['gambar']?>" width="150"> </td>
                        <td> <?= $row['judul'] ?> </td>
                        <td> <?= $row['kategori'] ?> </td>
                        <td> <?= $row['penulis'] ?> </td>
                        <td> <?= nl2br($row['konten']) ?> </td>
                        <td> <?= $row['tanggal'] ?> </td>
                        <td><a href="edit.php?nomor=<?= $row['nomor']; ?>"><span class='glyphicon glyphicon-edit'>Edit</span></a><br><br>
						<a href="../controller/delete.php?nomor=<?= $row['nomor']; ?>"><span class='glyphicon glyphicon-remove'>Delete</span></a></td>
					</tr>
					<?php
						endwhile;
						mysqli_free_result($result);
						mysqli_close($conn);
					?>
				</tbody>
			</table>
		</div>
</body>
</html>