<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
include 'conexion.php';

$id = $_POST['id'];
$des = $_POST['des'];
$cant = $_POST['cant'];
$vru = $_POST['vru'];
// Check for duplicate ID

$sql = "SELECT id FROM articulos WHERE id = $id";
$existeid = $con->query($sql);

if ($existeid->num_rows > 0) {
    echo "";
echo "<script>
    swal({
        title: 'Error',
        text: 'Ya existe un articulo con este ID !',
        icon: 'error'
    }).then(function() {
        window.location = 'index.php';
    });
</script>";
} else {
    // Insert new record
    $sql_new = "INSERT INTO articulos (id, des, cant, vru) VALUES ($id, '$des', $cant, $vru)";
    $res = $con->query($sql_new);
    if ($res) {
        echo "<script>
            swal({
                title: 'Exito',
                text: 'Nuevo articulo registrado con exito !',
                icon: 'success'
            }).then(function() {
                window.location = 'index.php';
            });
            </script>";
    }
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