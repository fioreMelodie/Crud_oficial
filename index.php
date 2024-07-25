<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP SOFIA</title>
    <link rel="stylesheet" href="estilos.css">
      <!--Enlace iconos Bootstrap-->
      <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include("includes/header.php"); ?>

    <div class="container">
        <h1><i class="bi bi-person-fill-gear">  Informacion usuarios</i></h1>
        <a href="crear.php" class="btn btn-primary">
        <i class="bi bi-person-fill-add"> Agregar usuario</i>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Edad</th>
                    <th>Fecha_nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM informacion";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['Nombre']}</td>
                            <td>{$row['Apellido']}</td>
                            <td>{$row['Telefono']}</td>
                            <td>{$row['Edad']}</td>
                            <td>{$row['Fecha_nacimiento']}</td>
                            <td>
                               <a href=\"editar.php?id={$row['id']}\" class=\"btn btn-primary\" style=\"margin-right: 15px;\">
                                    <i class=\"bi bi-pencil\"></i> Editar
                               </a>

                               <a href=\"eliminar.php?id={$row['id']}\" onclick=\"return confirm('Está seguro de eliminar este usuario?');\" class=\"btn btn-danger\">
                                    <i class=\"bi bi-trash-fill\"></i> Delete
                               </a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>