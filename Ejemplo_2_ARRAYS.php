<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays en PHP</title>
</head>
<body>
    
    <?php
        echo "<h3>---------------------- Vectores INDEXADOS ----------------------</h3>";
        $vectorAlumnos = array();
        $vectorAlumnos[0] = "Luke";
        $vectorAlumnos[1] = "Leia";
        $vectorAlumnos[2] = "Han";

        $vectorAlumnos[100] = "Chewbacca"; 
        var_dump($vectorAlumnos[1]);
        var_dump($vectorAlumnos[50]);

        var_dump($vectorAlumnos);

        $vectorCalificaciones = array();
        $vectorCalificaciones[0] = 100;
        $vectorCalificaciones[1] = 90;
        $vectorCalificaciones[2] = 80;

        array_push($vectorCalificaciones, 95);
        array_push($vectorCalificaciones, 70);

        echo "<ul>";
        echo "<br> --------------------- Datos en el vector ----------------------";
        for ($i=0; $i < count($vectorCalificaciones); $i++) { 
            echo "<li>Calificación: " . $i. " - " . $vectorCalificaciones[$i] . "</li>";
        }
        echo "</ul>";

        foreach ($vectorAlumnos as $dato) {
            echo "<br>Alumno: " . $dato;
        }

        $promedio = 0;
        $suma = 0;

        foreach ($vectorCalificaciones as $dato) {
            $suma += $dato;
        }
        $promedio = $suma / count($vectorCalificaciones);
        echo "<br>Promedio: " . $promedio;


        echo "<h3>---------------------- Vectores ASOCIATIVOS ----------------------</h3>";
        $vector_alumnos = array(
            "Luke" => 100,
            "Leia" => 100,
            "Han" => 70,
        );

        var_dump($vector_alumnos);
        foreach ($vector_alumnos as $alumno)
            echo "<br>" . $alumno;

        foreach($vector_alumnos as $clave => $valor)
            echo "<br>" . $clave;

        foreach($vector_alumnos as $clave => $valor)
            echo "<br>" . $valor;
        

        echo "<h3>---------------------- Vectores ASOCIATIVOS BIDIMENSIONALES ----------------------</h3>";

        $vector_alumnos_isc = array(
            "Luke" => array(100, 90, 85),
            "Leia" => array(100, 100, 100),
            "Han" => array(70, 80, 90),
        );
        var_dump($vector_alumnos_isc);
        /*Ejercicio: Encontrar
            1) Promedio del grupo
            2) Promedio del alumno
            3) Promedio por materia
        */

        $promedio_grupo = 0;
        $suma_grupo = 0;

        $promedio_alumno = 0;
        $suma_alumno = 0;

        $promedio_materia = 0;
        $suma_materia = 0;

        foreach ($vector_alumnos_isc as $calificaciones){
            $suma_grupo += $calificaciones[0] + $calificaciones[1] + $calificaciones[2];
        }
        $promedio_grupo = $suma_grupo / (count($vector_alumnos_isc) * 3);
        echo "<br>Promedio del grupo: " . $promedio_grupo;

        echo "<br>";

        foreach ($vector_alumnos_isc as $alumno => $calificaciones){
            foreach ($calificaciones as $calificacion){
                $suma_alumno += $calificacion;
            }
            $promedio_alumno = $suma_alumno / count($calificaciones);
            echo "<br>Promedio del alumno " . $alumno . ": " . $promedio_alumno;
            $suma_alumno = 0;
        }

        echo "<br>";

        for ($i=0; $i < 3; $i++) { 
            foreach ($vector_alumnos_isc as $calificaciones){
                $suma_materia += $calificaciones[$i];
            }
            $promedio_materia = $suma_materia / count($vector_alumnos_isc);
            echo "<br>Promedio de la materia " . ($i + 1) . ": " . $promedio_materia;
            $suma_materia = 0;
        }


    ?>
</body>
</html>