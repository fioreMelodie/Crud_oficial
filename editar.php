<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = mysqli_real_escape_string($conn, $_POST['Nombre']);
        $description = mysqli_real_escape_string($conn, $_POST['Apellido']);
        $description = mysqli_real_escape_string($conn, $_POST['Telefono']);
        $description = mysqli_real_escape_string($conn, $_POST['Edad']);
        $description = mysqli_real_escape_string($conn, $_POST['Fecha_nacimiento']);

        $query = "UPDATE informacion SET Nombre = '$Nombre', Apellido = '$apellido', Telefono = '$Telefono',
        Edad = '$Edad', Fecha_nacimiento = '$Fecha_nacimiento' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Task Updated Successfully';
        $_SESSION['message_type'] = 'warning';
        header('Location: index.php');
        exit();
    }

    $query = "SELECT * FROM informacion WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $informacion = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php include("includes/header.php"); ?>

    <div class="container">
        <h1><i class="bi bi-person-fill-up">  Editar usuario</i></h1>
        <form action="editar.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" name="Nombre" id="Nombre" value="<?php echo htmlspecialchars($informacion['Nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Apellido">Apellido:</label>
                <input type="text" name="Apellido" id="Apellido" value="<?php echo htmlspecialchars($informacion['Apellido']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Telefono">Telefono:</label>
                <input type="text" name="Telefono" id="Telefono" value="<?php echo htmlspecialchars($informacion['Telefono']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Edad">Edad:</label>
                <input type="number" name="Edad" id="Edad" value="<?php echo htmlspecialchars($informacion['Edad']); ?>" required>
            </div>
            <div class="form-group">
                <label for="Fecha_nacimiento">Fecha Nacimiento:</label>
                <input type="date" name="Fecha_nacimiento" id="Fecha_nacimiento" value="<?php echo htmlspecialchars($informacion['Fecha_nacimiento']); ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
</body>
</html>