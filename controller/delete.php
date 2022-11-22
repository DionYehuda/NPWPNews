<?php
require '../include/function.php';

    $id = $_GET["nomor"];
    
    if( delete($id)>0){
        echo "<script>
                alert ('Berita berhasil dihapus!!');
                document.location.href = '../view/admin.php'
            </script>";
    }

?>