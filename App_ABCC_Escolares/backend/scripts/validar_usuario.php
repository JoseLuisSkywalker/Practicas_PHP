<?php
session_start();

$user = $_POST['caja_usuario'] ?? '';
$pass = $_POST['caja_password'] ?? '';

$user_cifrado = hash('sha256', $user);
$pass_cifrada = hash('sha256', $pass);

require_once __DIR__ . '/../config/database/conexion_mysql_escuela.php';

$con = new ConexionBDEscuela();
$conexion = $con->getConexion();

if ($conexion) {
    $stmt = mysqli_prepare($conexion, "SELECT 1 FROM usuarios WHERE usuario = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $user_cifrado, $pass_cifrada);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($res) == 1) {
        session_regenerate_id(true);
        $_SESSION['usuario_autenticado'] = true;
        $_SESSION['nombre_usuario'] = $user;
        header("Location: ../../frontend/menu_principal.php");
        exit;
    } else {
        echo "No encontrado";
    }
}
?>