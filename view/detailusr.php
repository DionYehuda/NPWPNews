<?php 
	require '../include/conn.php';
	require '../include/function.php';
	session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    else{
        if($_SESSION["login"] !== 'user'){
            header("Location: ../index.php");	
        }
    }
    
    if(isset($_POST["comment"])){	
		if(comment($_POST)>0){
			echo "<script>
                alert('Komen Berhasil ditambah!!!');
            </script>";	
		}
		else{
			echo "<script>
                alert('Komen gagal ditambah!!!');	
            </script>";	
		}
	}
    $username = $_SESSION["username"];
    $id = $_GET["nomor"];
    $query = "SELECT * FROM user_action WHERE nomor = '$id'";
    $comment = $conn->query($query);
	$data = query("SELECT * FROM berita WHERE nomor = '$id'")[0];
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
            h4{
                color:grey;

            }
            .tab{
                padding:20px;
            }
            .image{
                width:30%;
            }
            img{
                width:400px;
            }
            .conten{
                width:50%;
            }
            .commentcont{
                background-color: black;
            }
            .comment{
                padding-left:10%;
                width:90%;
                color:white;
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
    <div class="tab">
        <table>
            <tr>
                <h2><?= $data['judul']?></h2>
                <h4>Kategori : <?= $data['kategori']?> | Penulis : <?= $data['penulis']?></h4>
                <h4><?= $data['tanggal']?></h4>
            </tr>
            <tr>
                <td class="image">
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="../img/<?= $data['gambar']?>"/>
                </td>
                <td class="content">
                    <h3 align="justify"><?= nl2br($data['konten'])?></h3>
                </td>
            </tr>
        </table><br><br>
        <div class="comment">
            <h4>Comment:</h4>
            <?php
				while($row = $comment->fetch_assoc()):
                    $iduser = $row['id_pengguna'];
                    $user = $conn->query("SELECT * FROM pengguna WHERE id_pengguna = '$iduser'");
                    $idusr = $user->fetch_assoc()
			?>
            <div class="commentcont">
                <tr>
                    <tr><h5><?= ($idusr['username']) ;?></h5></tr>
                    <tr>
                        <td><img src="../img/<?= $idusr['profile']?>" style="width:50px"></td>
                        <td><?= ($row['komen']); ?></td>
                    </tr>
                </tr><br> 
            </div>
            <?php 
                endwhile;
            ?>
        </div>
        <form class="" action="" method="post" id="comment">
		    <h4>Post a comment:</h4>
		    <textarea name="comment" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
		    <button type="submit" name="cmnt" class="btn btn-primary btn-sm pull-right" id="comment">Submit comment</button>
	    </form>
    </div>
</body>
</html>