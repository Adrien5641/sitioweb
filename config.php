<?php
$host = "localhost";
$usuario = "tu_usuario";
$contrasena = "tu_contrasena";
$base_datos = "asesoriaspsicologicas";

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>