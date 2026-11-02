<?php
    session_start(); // Antes de cualquier salida

    // Mientras depuras: muestra el error real en vez del 500 genérico
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include('../controllers/alumno_dao.php');
    $alumnoDAO = new AlumnoDAO();

    $nc = $_POST['caja_num_control'] ?? '';
    $nombre = $_POST['caja_nombre'] ?? '';
    $primerAp = $_POST['caja_primer_ap'] ?? '';
    $segundoAp = $_POST['caja_segundo_ap'] ?? '';
    $fechaNac = $_POST['caja_fecha_nac'] ?? '';
    $semestre = $_POST['caja_semestre'] ?? '';
    $carrera = $_POST['caja_carrera'] ?? '';

    //obtener los demas datos

    //VALIDACIONES
    /*SUPONIENDO QUE Numero de Control DEBE SER NUMERICO
        
        - Que exista la variable relacionada con el Dato.
        - No vacíos.
        - Que sean solo numeros. 

    */

    $nc_correcto = false;
    if(isset($nc) && !empty($nc) && is_numeric($nc)){
        $nc_correcto = true;
    }else{
        $_SESSION['error_nc'] = true;
    }


    //Nombre DEBE SER ALFABETICO
    


    //Crear el OBJETO de alumno
    if($nc_correcto ){
         //Invocamos a los metodos de operaciones abcc
        try {
            $res = $alumnoDAO->agregarAlumno($nc, $nombre, $primerAp, $segundoAp, $fechaNac, $semestre, $carrera);
        } catch (Throwable $e) {
            // Si la BD lanza excepción (llave duplicada, fecha inválida, etc.)
            $res = false;
            $_SESSION['error_bd'] = $e->getMessage();
        }
        
        if($res){
             //echo "Ya soy casi Ingenier@ inmortal";
            //header('location:../../frontend/menu_principal.php');
            $_SESSION['insercion_correcta'] = true; 
            header('location:../../frontend/formulario_altas.php');
            exit;

        }else{
            //"Me dedico a las REDES";
            $_SESSION['insercion_correcta'] = false;
            header('location:../../frontend/formulario_altas.php');
            exit;
        }
    }else{
        //else para el fallo de validaciones 
        $_SESSION['nc'] = $nc; 
        header('location: ../../frontend/formulario_altas.php'); 
        exit;
    }

?>