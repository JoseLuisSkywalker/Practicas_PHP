<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro PHP</title>
</head>
<body>
        <h3>Introducción a PHP</h3>

        <?php 
    
            echo "<h1>Magia magia</h1>";
            echo "<hr>";
            echo "Tipos de datos en PHP: <br>";
            $nombre = "Luke Skywalker"; // String
            $edad = 50; // Integer
            $peso = 87.9; // Float
            $jedi = true; // Boolean
            echo "<br>Nombre: " . $nombre;
            echo "<br>";
            var_dump($nombre);
            echo "<br>";
            var_dump($edad);
            echo "<br>";
            var_dump($peso);
            echo "<br>";
            var_dump($jedi);

            /*
            Comentario multilinea
            */

            //comentario de una sola linea
            
        ?>
</body>
</html>