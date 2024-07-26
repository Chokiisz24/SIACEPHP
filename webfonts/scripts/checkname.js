document.addEventListener('DOMContentLoaded', function() {
    // Obtén el elemento de entrada y el elemento donde mostrarás el resultado
    var nombreInput = document.getElementById('floatingInput');
    var resultado = document.getElementById('resultadoUser');

    // Agrega un evento de pérdida de foco al input
    nombreInput.addEventListener('blur', function() {
        // Obtiene el valor del input
        var nombre = nombreInput.value;

        // Realiza una consulta a la base de datos (puedes usar AJAX o Fetch para esto)
        // En este ejemplo, asumiré que tienes un archivo PHP que maneja la consulta
        var url = '../webfonts/php/ValidarNombreUsuario.php?nombre=' + encodeURIComponent(nombre);

        // Realiza la solicitud
        fetch(url)
            .then(response => response.json())
            .then(data => {
                // Muestra el resultado en la página
                if (data.existe) {
                    resultado.textContent = 'El nombre existe en la base de datos.';
                } else {
                    resultado.textContent = 'El nombre NO existe en la base de datos.';
                }
            })
            .catch(error => {
                console.error('Error al realizar la consulta:', error);
                resultado.textContent = 'Error al realizar la consulta.';
            });
    });
});
