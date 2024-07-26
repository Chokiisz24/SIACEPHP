document.addEventListener('DOMContentLoaded', function() {
    // Obtén el elemento de entrada y el elemento donde mostrarás el resultado
    //validacion para user
    var nombreInput = document.getElementById('UserId');
    var resultadoInput = document.getElementById('resultUser');
   


    // Agrega un evento de pérdida de foco al input
    nombreInput.addEventListener('blur', function() {
        // Obtiene el valor del input
        var nombre = nombreInput.value;

        // Realiza una consulta a la base de datos (puedes usar AJAX o Fetch para esto)
        // En este ejemplo, asumiré que tienes un archivo PHP que maneja la consulta
        var url = '../webfonts/php/ValidarNombreUsuariosingup.php?Usuario=' + encodeURIComponent(nombre);

        // Realiza la solicitud
        fetch(url)
            .then(response => response.json())
            .then(data => {
                // Muestra el resultado en la página
                if (data.existe) {
                    resultadoInput.textContent = 'El nombre de usuario esta ocupado.';
                } else {
                    resultadoInput.textContent = 'El nombre de usuario disponible.';
                }
            })
            .catch(error => {
                console.error('Error al realizar la consulta:', error);
                resultado.textContent = 'Error al realizar la consulta.';
            });
    });
});
