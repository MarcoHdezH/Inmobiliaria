<?php 

//Importar Conexion
require 'includes/config/database.php';
$db = conectarDB();

//Crear Email-Password
$email = "marco7245@hotmail.com";
$password = "123456";

$passwordHash = password_hash($password,PASSWORD_DEFAULT);

//Query
$query = "INSERT INTO usuarios (email,password) VALUES ('$email','$passwordHash')";

//Agregar a DB
mysqli_query($db,$query);

mysqli_close($db);

?>