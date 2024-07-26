document.querySelector('.enviar-button').addEventListener('click', function(event) {
    event.preventDefault();
    const nombre = document.getElementById('nombre').value;
    const apellidoPaterno = document.getElementById('apellidoPaterno').value;
    const apellidoMaterno = document.getElementById('apellidoMaterno').value;
    
    const inicialNombre = nombre.substring(0, 2);
    const inicialApellidoPaterno = apellidoPaterno.substring(0, 2);
    const inicialApellidoMaterno = apellidoMaterno.substring(0, 2);
    
    window.location.href = `graciasporregistrarte.php?iniciales=${inicialNombre}-${inicialApellidoPaterno}-${inicialApellidoMaterno}`;
});
