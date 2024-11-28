<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
include 'conexion.php';

$id = $_POST['idx'];
$des = $_POST['des'];
$cant = $_POST['cant'];
$vru = $_POST['vru'];

$sql = "UPDATE articulos SET des='$des', cant=$cant, vru=$vru WHERE id=$id";

if ($con->query($sql) === TRUE) {
    echo "<script>
            swal({
                title: 'Exito',
                text: 'Articulo actualizado con exito !',
                icon: 'success'
            }).then(function() {
                window.location = 'index.php';
            });
            </script>";
} else {
    echo "Error updating record: " . $con->error;
}
$con->close();
?>
</body>
</html>
<style>
    .swal-text, .swal-title {
        color: black;
        font-family: Arial, sans-serif;
    }
</style>