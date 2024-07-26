document.addEventListener('DOMContentLoaded', () => {
    const contenedorQR = document.getElementById('contenedorQR');
    const QR = new QRCode(contenedorQR);
    const textoSpan = document.querySelector('.textoSpan').innerText;
    QR.makeCode(textoSpan);
});
function descargarQR() {
    const contenedorQR = document.getElementById('contenedorQR');
    const imagenQR = contenedorQR.querySelector('img');
    
    if (imagenQR) {
        const enlaceDescarga = document.createElement('a');
        enlaceDescarga.href = imagenQR.src;
        enlaceDescarga.download = 'codigo_qr.png';
        document.body.appendChild(enlaceDescarga);
        enlaceDescarga.click();
        document.body.removeChild(enlaceDescarga);
    } else {
        alert('Primero genera el código QR antes de descargarlo.');
    }
}