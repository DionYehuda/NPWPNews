<?php
	session_start();
	require '../include/conn.php';
	require '../include/function.php';
	if(isset($_POST["login"]) ) {
		if($_POST["username"] === ""){
			echo "<script>
				alert('Username/Email Wajib diisi');
			</script>";
		}
		else{
			if($_POST["password"] === ""){
				echo "<script>
					alert('Password Wajib diisi');
				</script>";
			}
			else 
			{
				if(loginuser($_POST) > 0) 
				{
					header('Location: user.php');
				}
				else{
					if(loginadm($_POST) > 0) 
					{
						header('Location: admin.php');
					}
				}
			}
		}
	}
	else
	{
		echo mysqli_error($conn);
	}
?>	

<!DOCTYPE html>	
<html>
<head>
	<title> Login</title>
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
		<script src="https://www.google.com/recaptcha/api.js"></script>
		<style>
			ul{
				list-style-type: none;
				margin-left: 20%;
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
			#login{
				color: white;
				background-color: black;
				border: solid 1px black;
				border-radius: 5px;
				margin-top: 10px;
				padding: 5px 10px;
				transition: .2s;
			}
			#login:hover{
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
		</style>
</head>
<body>
	<body>
		<header>
			<nav class="navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<h4 style="color:white"> NPW PNews </h4>
					</div>
				</div>
			</nav>
		</header>
		<h1>LOGIN</h1><br><br><br>
		<form action="" method="post"> 
			<ul>
				<li class="form">
					<label for="username" id="label" >Username/Email</label>
					<input type="text" name="username" id="username" placeholder="Username/Email" style="width:50%;" class="input">
				</li>
				<li class="form">
						<label for="password" id="label">Password </label>
						<input type="password" name="password" id="password" placeholder="Password" autocomplete="off" style="width:50%;"class="input">
				</li>
				<li class="form">
					<button type="submit" name="login" id="login">Login</button>
					<button type="cancel" name="cancel" id="cancel"><a href='../index.php'>Cancel</a></button>
				</li>
			</ul>
		</form>
	</body>
</html>
		