<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <!-- <form action="scripts/login_post.php" method="post"> -->
    <form action="scripts/login_get.php" method="GET">

        <br>
        <label for="caja_usuario">Usuario: </label>
        <input type="text" name="caja_usuario" id="caja_usuario" placeholder="Usuario">

        <br>
        <label for="caja_password">Contraseña: </label>

        <input type="text" name="caja_password" id="caja_password" placeholder="Contraseña">
        <br>
        <input type="submit" value="ACCEDER">
    </form>
</body>
</html>