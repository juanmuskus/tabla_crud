<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.5/dist/bootstrap-table.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.5/dist/bootstrap-table.min.js"></script>
    <title>Articulos CRUD</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="alert alert-primary" role="alert">
                <div class="row">
                    <div class="col-10">
                        <strong><i class="bi bi-stack"></i> Articulos</strong>
                    </div>
                    <div class="col-2">
                        <button class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#nart"><i class="bi bi-plus-circle"></i> Nuevo</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <table
                class="table table-striped"
                data-toggle="table"
                data-search="true"
                data-pagination="true"
                id="tart">
                <thead>
                    <tr>
                        <th data-sortable="true" data-field="id">Id</th>
                        <th data-sortable="true" data-field="des">Descripcion</th>
                        <th>Cant.</th>
                        <th>Vr. Unitario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'conexion.php';
                    $sql = "SELECT * FROM articulos";
                    $res = $con->query($sql);
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['des'] . "</td>";
                        echo "<td>" . $row['cant'] . "</td>";
                        echo "<td> $ " . number_format($row['vru']) . "</td>";
                        echo "<td><a href='' class='btn btn-warning' id='beditar'><i class='bi bi-pencil'></i> Editar</a> <a href='eliminar.php?id=" . $row['id'] . "' class='btn btn-danger'><i class='bi bi-trash'></i> Eliminar</a></td>";
                        echo "</tr>";
                    }
                    $con->close();
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-2">
                <button class="btn btn-primary" id="bpdf"><i class="bi bi-filetype-pdf"></i> Reporte PDF</button>
            </div>        
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="nart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Articulo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="nuevo.php" method="post">
                        <div class="mb-3">
                            <label for="id" class="form-label">Id:</label>
                            <input type="number" class="form-control" id="id" name="id" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="des" id="des" required>
                        </div>
                        <div class="mb-3">
                            <label for="cant" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control" id="cant" name="cant" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="vru" class="form-label">Vr. Unitario</label>
                            <input type="number" class="form-control" id="vru" name="vru" aria-describedby="emailHelp" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cerrar</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="eart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Articulo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="actualizar.php" method="post">
                        <div class="mb-3">
                            <label for="id" class="form-label">Id:</label>
                            <input type="number" class="form-control" id="id" name="id" aria-describedby="emailHelp" disabled>
                            <input type="hidden" name="idx" id="idx">
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="des" id="des" required>
                        </div>
                        <div class="mb-3">
                            <label for="cant" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control" id="cant" name="cant" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="vru" class="form-label">Vr. Unitario</label>
                            <input type="number" class="form-control" id="vru" name="vru" aria-describedby="emailHelp" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cerrar</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-arrow-repeat"></i> Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script src="bootstrap-table-es-AR.js"></script>
<script>
    $(document).ready(function() {

    $('#tart').bootstrapTable({  
    pagination: true,  
    pageNumber: 1, // default page number  
    pageSize: 5, // default page size (number of records per page)  
    pageList: [5, 10, 25, 50, 100], // list of page sizes to display  
    });  

    // click en el boton editar
    $(document).on('click', '#beditar', function(e) {
        e.preventDefault();
        var $row = $(this).closest('tr'); 
        var id = $row.find('td:eq(0)').text(); // id
        var des = $row.find('td:eq(1)').text(); // descripcion
        var cant = $row.find('td:eq(2)').text(); // cant
        const numberValue = parseFloat($row.find('td:eq(3)').text().replace('$', '').replace(',', ''));  
        var vru = numberValue; // quitar el signo peso y convertir en numero

        // llenar los inputs del modal
        $('#eart #id').val(id);
        $('#eart #idx').val(id);
        $('#eart #des').val(des);
        $('#eart #cant').val(cant);
        $('#eart #vru').val(vru);
        // mostrar el modal
        $('#eart').modal('show');
    });

    
    $('#bpdf').on('click', function() {
        window.open('reporte.php', '_blank');
    });
});
</script>