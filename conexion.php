<?php
session_start();

// Establecer conexión a la base de datos
$conn = mysqli_connect(
    'localhost',  // Servidor de base de datos
    'root',       // Usuario de la base de datos
    '',           // Contraseña de la base de datos (vacía por defecto)
    'crudphp'     // Nombre de la base de datos
);

// Tiene como fin el verificar si la conexión con la base de datos fue exitosa 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>