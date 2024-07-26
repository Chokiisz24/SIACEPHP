document.addEventListener('DOMContentLoaded', function() {
    const params = new URLSearchParams(window.location.search);
    const iniciales = params.get('iniciales');
    
    document.getElementById('iniciales').textContent = iniciales;
});
