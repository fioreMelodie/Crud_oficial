<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM informacion WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Usuario eliminado con exito';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
    exit();
}
?>
