<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Nombre = mysqli_real_escape_string($conn, $_POST['Nombre']);
    $Apellido = mysqli_real_escape_string($conn, $_POST['Apellido']);
    $Telefono = mysqli_real_escape_string($conn, $_POST['Telefono']);
    $Edad = mysqli_real_escape_string($conn, $_POST['Edad']);
    $Fecha_nacimiento = mysqli_real_escape_string($conn, $_POST['Fecha_nacimiento']);

    $query = "INSERT INTO informacion (Nombre, Apellido, Telefono, Edad, Fecha_nacimiento) 
    VALUES ('$Nombre', '$Apellido', '$Telefono', '$Edad', '$Fecha_nacimiento')";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Task Created Successfully';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
    <link rel="stylesheet" href="estilos.css">
     <!--Enlace iconos Bootstrap-->
     <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include("includes/header.php"); ?>

    <div class="container">
        <h1><i class="bi bi-person-fill-add">   Crear nuevo usuario</i></h1>
        <form action="crear.php" method="POST">
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" required>
            </div>
            <div class="form-group">
                <label for="Apellido">Apellido:</label>
                <input type="text" name="Apellido" id="Apellido" required>
            </div>
            <div class="form-group">
                <label for="Telefono">Telefono:</label>
                <input type="number" name="Telefono" id="Telefono" required>
            </div>
            <div class="form-group">
                <label for="Edad">Edad:</label>
                <input type="number" name="Edad" id="Edad" required>
            </div>
            <div class="form-group">
                <label for="Fecha_nacimiento">Fecha nacimiento:</label>
                <input type="date" name="Fecha_nacimiento" id="Fecha_nacimiento" required>
            </div>
            <button type="submit" class="btn btn-success">Crear</button>
        </form>
    </div>

</body>
</html>
