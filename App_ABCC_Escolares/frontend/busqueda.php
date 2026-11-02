<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <?php require_once('menu_principal.php'); ?>

    <h3>Listado de Alumnos</h3>

    <?php  
        //include_once('../backend/controllers/alumno_dao.php');
        require_once __DIR__ . '/../backend/controllers/alumno_dao.php';
        $alumnoDAO = new AlumnoDAO();

        $datos = $alumnoDAO->mostrarAlumnos('x');

        if (isset($_GET['nc'])) {
            $nc = $_GET['nc'];

            $resultado = $alumnoDAO->consultarAlumno($nc);
            $alumno = mysqli_fetch_assoc($resultado);
        }



        $i = 0;
        if(mysqli_num_rows($datos) == 0){
            echo "No hay registros";
        }else{
          
            echo '<div class= "container">';
            echo '<form class="d-flex my-3" action="busqueda.php" method="GET">';
            echo '<input id="filtro" class="form-control me-2" type="search" placeholder="Buscar por nc o nombre" aria-label="Search">';
            echo '<button class="btn btn-outline-success" type="submit">Buscar</button>';
            echo '</form>';
        }
    ?>



    
    <div class="modal fade" id="modalDetalles" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Detalles del alumno</h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <p><strong>Número de control:</strong> <span id="nc"></span></p>
                    <p><strong>Nombre:</strong> <span id="nombre"></span></p>
                    <p><strong>Primer apellido:</strong> <span id="primerAp"></span></p>
                    <p><strong>Segundo apellido:</strong> <span id="segundoAp"></span></p>
                    <p><strong>Fecha de nacimiento:</strong> <span id="fechaNac"></span></p>
                    <p><strong>Semestre:</strong> <span id="semestre"></span></p>
                    <p><strong>Carrera:</strong> <span id="carrera"></span></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>

            </div>
        </div>
    </div>

    <script>
    document.querySelectorAll('.btn-detalles').forEach(boton => {

        boton.addEventListener('click', async function () {

            const nc = this.dataset.nc;

            try {
                const respuesta = await fetch(
                    '../backend/scripts/procesar_consultas.php?nc='
                    + encodeURIComponent(nc)
                );

                const alumno = await respuesta.json();

                if (alumno.error) {
                    alert(alumno.error);
                    return;
                }

                document.getElementById('nc').textContent =
                    alumno.Num_Control ?? '';

                document.getElementById('nombre').textContent =
                    alumno.Nombre ?? '';

                document.getElementById('primerAp').textContent =
                    alumno.Primer_Ap ?? '';

                document.getElementById('segundoAp').textContent =
                    alumno.Segundo_Ap ?? '';

                document.getElementById('fechaNac').textContent =
                    alumno.Fecha_Nac ?? '';

                document.getElementById('semestre').textContent =
                    alumno.Semestre ?? '';

                document.getElementById('carrera').textContent =
                    alumno.Carrera ?? '';

                const elementoModal =
                    document.getElementById('modalDetalles');

                const modal =
                    bootstrap.Modal.getOrCreateInstance(elementoModal);

                modal.show();

            } catch (error) {
                console.error(error);
                alert('Ocurrió un error al consultar al alumno.');
            }

        });

    });
    </script>

    </div>
</body>
</html>