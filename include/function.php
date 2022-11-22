<?php require 'conn.php';

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){ 
    global $conn;
    $username = $data["username"];
    $password = $data["password"];
    $password2 = $data["password2"];
    $first_name = $data["first_name"];
    $last_name = $data["last_name"];
    $birthdate = $data["birthdate"];
    $sex = $data["sex"];
    $error = $_FILES['gambar']['error'];

    if( $error !== 4){
            $gambar = upload();
            if(!$gambar) {
                return false;
            }
        }
    else{
            $gambar = "defaul.jpg";
    }

    $result = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){
        echo "<script>
            alert('Username telah digunakan!!');
        </script>";
        return false;
    }

    if($password !== $password2){
        echo "<script>
            alert('Konfirmasi password tidak sesuai!!');
            </script>";
        return false;
    }
    $password = md5($password);
    mysqli_query($conn,"INSERT INTO pengguna VALUES ('', '$first_name', '$last_name', '$username', '$password', '$birthdate', '$sex', '$gambar')");
    return 1;
}
// testing
function loginuser($data){
    global $conn;
    $username = $data["username"];
    $password = $data["password"];

    $result = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){
        $password = md5($password);
		$password2 = mysqli_query($conn, "SELECT pass FROM pengguna WHERE username = '$username' AND pass ='$password'");
		if(mysqli_num_rows($password2) === 1){
            $_SESSION["login"] = 'user';
            $_SESSION["username"] = $username;
            echo "<script>
                alert('berhasil login');
            </script>";
            return 1;
        }
        else
        {
            echo "<script>
                alert ('Password Salah!!');
            </script>";
            return 0;
        }
    }
}

    function loginadm($data){
        global $conn;
    $username = $data["username"];
    $password = $data["password"];

    $result = mysqli_query($conn, "SELECT username FROM administrator WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){
        $password = md5($password);
		$password2 = mysqli_query($conn, "SELECT pass FROM administrator WHERE username = '$username' AND pass ='$password'");
		if(mysqli_num_rows($password2) === 1){
            $_SESSION["login"] = 'admin';
            echo "<script>
                alert('berhasil login');
            </script>";
            return 1;
        }
        else
        {
            echo "<script>
                alert ('Password Salah!!');
            </script>";
        }
        }
        else{
            echo "<script>
                alert ('Username Salah!!');
            </script>";
        }
    }

    function edit($data){
        global $conn;
        $nomor = $data["nomor"];
        $judul = $data["judul"];
        $kategori = $data["kategori"];
        $penulis = $data["penulis"];
        $konten = $data["konten"];
        $date = $data["tanggal"];
        $gambar = $_FILES['gambar']['name'];
        $error = $_FILES['gambar']['error'];
        if( $error !== 4){
            $gambar = upload();
            if(!$gambar) {
                return false;
            }
        }
        if($gambar === ""||$gambar === null)
        {$query = "UPDATE berita SET
                    judul = '$judul',
                    kategori = '$kategori',
                    penulis = '$penulis',
                    konten = '$konten',
                    tanggal = '$date'
                WHERE nomor = '$nomor'
                    ";}
        else {
            $query = "UPDATE berita SET
                    judul = '$judul',
                    kategori = '$kategori',
                    penulis = '$penulis',
                    konten = '$konten',
                    tanggal = '$date',
                    gambar = '$gambar'
                    nomor = '$nomor'";
        }
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function add($data){
        global $conn;

        $judul = $data["judul"];
        $kategori = $data["kategori"];
        $penulis = $data["penulis"];
        $konten = $data["konten"];
        $date = $data["tanggal"];

        $gambar = upload();
        if(!$gambar) {
            return false;
        }

        $query = "INSERT INTO berita 
                    VALUES('', '$judul', '$kategori', '$penulis', '$konten', '$date', '$gambar');";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function upload(){

        $namafile = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];

        if($error === 4){
            echo "<script>
                alert('Masukkan Gambar!!');	
            </script>";
            return false;
        }

        $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
        $ekstensigambar = explode('.', $namafile);
        $ekstensigambar = strtolower(end($ekstensigambar));
        if( !in_array($ekstensigambar, $ekstensigambarvalid)){
            echo "<script>
                alert('Yang anda upload bukan gambar!');	
            </script>";
            return false;
        }

        if($ukuranfile> 5000000){
            echo "<script>
                alert('Ukuran gambar terlalu besar');	
            </script>";
        }

        move_uploaded_file($tmpname, '../img/'. $namafile);

        return $namafile;

    }

    function comment($data){
        global $conn;  
        $user = $_SESSION["username"];
        $id = $_GET["nomor"];
        $comment = $data["comment"];
        $iduser = query("SELECT id_pengguna FROM pengguna WHERE username = '$user'")[0];
        $iduser = $iduser['id_pengguna'];
        $query = "INSERT INTO user_action 
                    VALUES('', '$id', '$iduser', '$comment');";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function delete($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM berita WHERE nomor = $id");
        return mysqli_affected_rows($conn);
    }
?>
