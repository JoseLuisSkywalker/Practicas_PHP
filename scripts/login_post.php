<?php
    echo "Invocando magia desde el servidor";

    echo "<br>" . $_SERVER['PHP_SELF'];
    echo "<br>" . $_SERVER['SERVER_NAME'];
    echo "<br>" . $_SERVER['HTTP_HOST'];
    echo "<br>" . $_SERVER['SCRIPT_NAME'];
    echo "<br>" . $_SERVER['HTTP_USER_AGENT'];

    echo "================== DATOS DEL FORMULARIO ==================";
    $usuario = $_POST['caja_usuario'];
    $contrasena = $_POST['caja_password'];

    echo "<br>Usuario: " . $usuario;
    echo "<br>Contraseña: " . $contrasena;

    //Validacion -------------------------------------------------
    
?>