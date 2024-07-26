<?php

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT p.idParticipantes, p.nombres, p.apellidoPaterno, p.apellidoMaterno, e.nombre, e.fechaInicio, e.fechaFin
FROM participantes p
INNER JOIN eventos e 	
ON p.evento = e.idEventos;
";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$participante=$resultado->fetchAll(PDO::FETCH_ASSOC);
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

    <title>Participantes</title>

</head>
<body>
    

                <dialog id="modal">
                    <img src="../img/CROQUIS.png" width="1200">
                    <div>
                    <button id="cerrar-modal">Cerrar</button>
                    </div>
                </dialog>
    <div class="container pt-5 justify-content">
        
                <div class="box">
                    
                    <label class="fs-1 fw-bold text-blue textowhite ">PARTICIPANTES</label>
                    <img src="../img/solacyt.png"  class="col-md-2 offset-md-3">
                    <img src="../img/unedl.png"  class="alinear-derecha col-md-2">            
                </div>
        <div class="container">
            <div class="pt-4 justify-content ">
            <a href="admin.php" class="btn btn-lg btn-light fw-semibold">ASISTENCIAS
            <i class="bi bi-card-checklist"></i></a>
            </div>
                            <div class="col-lg-12 pt-5">
                <div>
                    <!--Aqui inicia la tabla  -->
                    <table id="example" class="table table-borderless" style="width:100%">

                </div>

                        <thead class="text-center table-info">
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Evento</th>
                        <th>Fecha Inicio Evento</th>
                        <th>Fecha Fin Evento</th>

                        
                        </thead>
                    <tbody>
                        <?php
                        foreach($participante as $participantes){
                        ?>
                        <tr>
                        <td> <?php echo $participantes['nombres'] ?></td>
                        <td> <?php echo $participantes['apellidoPaterno'] ?></td>
                        <td> <?php echo $participantes['apellidoMaterno'] ?></td>
                        <td> <?php echo $participantes['nombre'] ?></td>
                        <td> <?php echo $participantes['fechaInicio'] ?></td>
                        <td> <?php echo $participantes['fechaFin'] ?></td>




                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
            <div id="contenedor">
           </div>  
        </div>

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
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
        </body>
</html>

<!-- <script>
$(document).ready(function() {
        var table = $('#example').DataTable({
            dom: 'Pfrtip',
            // paging: false,
            // retrieve: true,
            // searching: false
    });
        var container = $('#contenedor');
        var chart = Highcharts.chart(container[0],{
            chart:{
                type:'pie'
            },
            title:{
                text:'Participantes'
            },
            series:[
                {
                    data: chartData(table)
                }
            ]
        });
        //En cada seleccion de filtro, se acutualiza los datos en el grafico
        table.on('draw',function(){
            chart.series[0].setData(chartData(table));
        });
        //funcion chartdata
        function chartData(table){
            var filasAfectadas = {};
            table.column(3,{ search: 'applied' }).data().each(function(val){
                if (filasAfectadas[val]) {
                    filasAfectadas[val] += 1;
                } else {
                    filasAfectadas[val] = 1;
                }
                });
            return $.map(filasAfectadas,function(cantidad,clave){
                return{
                    name: clave,
                    y: cantidad
                };
            });
        }
} );
</script> -->

