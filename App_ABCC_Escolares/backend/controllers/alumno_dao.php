<?php

    //include_once("../config/database/conexion_mysql_escuela.php");
    require_once __DIR__ . '/../config/database/conexion_mysql_escuela.php';

    $conexion = new ConexionBDEscuela();

    $con = $conexion->getConexion();

    //var_dump($con);

    class AlumnoDAO{
        private $conexion;

        public function __construct(){
            $con = new ConexionBDEscuela();
            $this->conexion = $con->getConexion();
        }


        //============ METODOS ABCC (CRUD) =================

        //------------ALTAS--------------
        public function agregarAlumno($nc, $nombre, $primerAp, $segundoAp, $fechaNac, $semestre, $carrera){

            $sql = "INSERT INTO Alumnos VALUES('$nc', '$nombre', '$primerAp', '$segundoAp', '$fechaNac', '$semestre', '$carrera')";
            $res = mysqli_query($this->conexion, $sql);

            return $res;
        }

        //-------------BAJAS--------------
        public function eliminarAlumno($nc){

            $sql = "DELETE FROM Alumnos WHERE Num_Control = '$nc'";
            $res = mysqli_query($this->conexion, $sql);

            return $res;
        }

        //------------ CAMBIOS -------------
        public function editarAlumno($nc, $nombre, $primerAp, $segundoAp,
                                    $fechaNac, $semestre, $carrera){

            $sql = "UPDATE Alumnos SET Nombre = '$nombre', Primer_Ap = '$primerAp', Segundo_Ap = '$segundoAp', Fecha_Nac = '$fechaNac', 
            Semestre = '$semestre', 
            Carrera = '$carrera'
            WHERE Num_Control = '$nc'";

            $res = mysqli_query($this->conexion, $sql);

            return $res;
        }

        //--------------CONSULTAS--------------
        public function mostrarAlumnos($filtro){
            $sql = "SELECT Num_Control, Nombre, Primer_Ap, segundo_ap FROM Alumnos";
            return mysqli_query($this->conexion, $sql);
        }

        //------------ CONSULTAR ALUMNO-------------------
        public function consultarAlumno($nc){

            $sql = "SELECT * FROM Alumnos WHERE Num_Control = '$nc'";

            $res = mysqli_query($this->conexion, $sql);

            return $res;
        }


        public function buscarAlumnos($filtro){
            $sql = "SELECT Num_Control, Nombre, Primer_Ap, segundo_ap
                    FROM Alumnos
                    WHERE Num_Control LIKE ?
                        OR Nombre LIKE ?
                        OR Primer_Ap LIKE ?
                        OR segundo_ap LIKE ?";


            //esta es como mysqli_query pero para consultas
            //preparadas
            $res = mysqli_prepare($this->conexion, $sql);
            $like = "%" . $filtro . "%";
            mysqli_stmt_bind_param($res, "ssss", $like, $like, $like, $like);
            mysqli_stmt_execute($res);

            return mysqli_stmt_get_result($res);
               
        }
    }



?>