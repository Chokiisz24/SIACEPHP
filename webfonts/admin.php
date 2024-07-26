<?php

include_once 'conexion.php';
include_once 'validacion_session.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT asi.idAsistencias,par.nombres,par.apellidoPaterno,par.email,asi.fechaEntrada,
asi.fechaSalida,eve.nombre,eve.fechaInicio,eve.fechaFin FROM `Asistencias` as asi inner join 
Participantes as par on par.idParticipantes = asi.participante inner join Eventos as eve on eve.idEventos = par.evento;";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$asistencia=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Codigo de Css propio -->
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
<!-- estilos de boostrap para la tabla -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <!-- iconos de boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Asistencias</title>

</head>
<body>
    

                <dialog id="modal">
                    <img src="../img/CROQUIS.png" width="1200">
                    <div>
                    <button id="cerrar-modal"> Cerrar</button>
                    </div>
                </dialog>
    <div class="container pt-5 justify-content">
        
                <div class="box">
                    
                    <label class="fs-1 fw-bold text-blue textowhite ">ASISTENCIAS</label>
                    <img src="../img/solacyt.png"  class="col-md-2 offset-md-3">
                    <img src="../img/unedl.png"  class="alinear-derecha col-md-2">            
                </div>
        <div class="container">
        <div class="pt-4 justify-content ">
            <a href="participantes.php" class="btn btn-lg btn-light fw-semibold">PARTICIPANTES
            <i class="bi bi-person-circle"></i>
            </a>
        </div>
            <div class="col-lg-12 pt-5">
                <div>

                    <table id="example" class="table table-borderless" style="width:100%">

                </div>

                        <thead class="text-center table-info">
                        <th>Nombre</th>
                        <th>Apellido Materno</th>
                        <th>Email</th>
                        <th>Fecha De Entrada</th>
                        <th>Fecha de Salida</th>
                        <th>Nombre del Evento</th>
                        <th>Fecha de Inicio Evento</th>
                        <th>Fecha de Fin Evento</th>
                        
                        </thead>
                    <tbody>
                        <?php
                        foreach($asistencia as $asistencias){
                        ?>
                        <tr>
                        <td> <?php echo $asistencias['nombres'] ?></td>
                        <td> <?php echo $asistencias['apellidoPaterno'] ?></td>
                        <td> <?php echo $asistencias['email'] ?></td>
                        <td> <?php echo $asistencias['fechaEntrada'] ?></td>
                        <td> <?php echo $asistencias['fechaSalida'] ?></td>
                        <td> <?php echo $asistencias['nombre'] ?></td>
                        <td> <?php echo $asistencias['fechaInicio'] ?></td>
                        <td> <?php echo $asistencias['fechaFin'] ?></td>

                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>

        </div>
        <form action="logout.php" method="post">
            <div class="mt-md-1" >

                <button type="submit" class="btn btn-danger btn-lg ms-2">Logout <i class="bi bi-box-arrow-left"></i></button>
            </div>
        </form>
    </div>


    <!-- Botones -->    
    <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js" type="text/javascript"></script>
    <script src="../js/scriptdataTable.js"></script>
        </body>
</html>

<!-- <script>
$(document).ready(function() {
    // var table = $('#example').DataTable( {
    //     lengthChange: true,
    //     buttons: [ 'print', 'excel', 'pdf', 'colvis' ]
    // } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script> -->

