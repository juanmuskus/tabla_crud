<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM articulos WHERE id = $id";
if ($con->query($sql) === TRUE) {
    echo "<script>
            swal({
                title: 'Exito',
                text: 'Articulo eliminado con exito !',
                icon: 'success'
            }).then(function() {
                window.location = 'index.php';
            });
            </script>";
} else {
    echo "Error al eliminar el articulo: " . $conn->error;
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