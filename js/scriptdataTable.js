
$(document).ready(function() {
    // Inicialización de DataTable
    var table = $('#example').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        dom: 'Bfrtilp',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="bi bi-filetype-csv"></i>',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="bi bi-filetype-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text: '<i class="bi bi-printer"></i>',
                titleAttr: 'Imprimir',
                className: 'btn btn-secondary'
            },
            {
                extend: 'colvis',
                text: 'Filtrar Columnas',
                className: 'btn btn-light'
            },
        ]
    });

    // Inicialización de Highcharts
    var container = $('#contenedor');
    Highcharts.setOptions({
        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        })
    });
    var chart = Highcharts.chart(container[0], {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Participantes',
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {    
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<span style="font-size: 1.2em"><b>{point.name}</b></span><br>' +
                        '<span style="opacity: 0.6">{point.percentage:.1f} %</span>',
                    connectorColor: 'rgba(128,128,128,0.5)'
                }
            }
        },
        series: [{
            data: chartData(table)
        }]
    });

    // En cada selección de filtro, se actualizan los datos en el gráfico
    table.on('draw', function() {
        chart.series[0].setData(chartData(table));
    });

    // Función chartData
    function chartData(table) {
        var filasAfectadas = {};
        table.column(3, { search: 'applied' }).data().each(function(val) {
            if (filasAfectadas[val]) {
                filasAfectadas[val] += 1;
            } else {
                filasAfectadas[val] = 1;
            }
        });
        return $.map(filasAfectadas, function(cantidad, clave) {
            return {
                name: clave,
                y: cantidad
            };
        });
    }
});


   
//    const btnAbrirModal = document.querySelector("#abrir-modal");
//    const btnCerrarModal = document.querySelector("#cerrar-modal");
//    const modal = document.querySelector("#modal");

//    btnAbrirModal.addEventListener('click', function(){
//        modal.showModal();
//    })
//    btnCerrarModal.addEventListener('click',function(){
//        modal.close();
//    })
