<?php

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../controllers/alumno_dao.php';

$alumnoDAO = new AlumnoDAO();

if (isset($_GET['nc'])) {

    $nc = $_GET['nc'];

    $resultado = $alumnoDAO->consultarAlumno($nc);
    $alumno = mysqli_fetch_assoc($resultado);

    if ($alumno) {
        echo json_encode($alumno, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode([
            'error' => 'No se encontró al alumno'
        ]);
    }

} else {
    echo json_encode([
        'error' => 'No se recibió el número de control'
    ]);
}