document.addEventListener('DOMContentLoaded', function() {
      // Obtén el elemento de entrada y el elemento donde mostrarás el resultado
      const input1 = document.getElementById("EmailId");
      const log = document.getElementById("resultEmail");
      let inputValue = ""; // Variable para almacenar el valor

      // Agrega un evento de escucha para el evento de tecla presionada
      input1.addEventListener("keydown", logKey);

      function logKey(e) {
        // Verificar si el evento proviene del input1
        if (e.target === input1) {
            const keyValue = e.key;

            // Verificar si la tecla es válida en una dirección de correo electrónico
            if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]$/i.test(keyValue)) {
                // Agregar el valor de la tecla a la variable
                inputValue += keyValue;
                
                // Realizar la solicitud solo si la longitud de la cadena es mayor o igual a 3 (por ejemplo)
                if (inputValue.length >= 3) {
                    var url = '../webfonts/php/ValidarEmailsingup.php?Email=' + encodeURIComponent(inputValue);

                    // Realizar la solicitud
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            // Muestra el resultado en la página
                            if (data.existe) {
                                log.textContent = 'El Email está registrado.';
                            } else {
                                log.textContent = 'El Email está disponible.';
                            }
                        })
                        .catch(error => {
                            console.error('Error al realizar la consulta:', error);
                            log.textContent = 'Error al realizar la consulta.';
                        });
                }
            } else if (keyValue === 'Backspace') {
                // Eliminar el último carácter de la variable en caso de tecla de retroceso
                inputValue = inputValue.slice(0, -1);
            }

        }
    }

      
    });