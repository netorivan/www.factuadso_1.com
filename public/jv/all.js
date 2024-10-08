// este es el segmento de codigo para el mensaje e alerta
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password_user').value;

        if (!email || !password) {
            event.preventDefault(); // Evitar el envío del formulario
            alert('Por favor, complete ambos campos.'); // Mensaje de alerta
        }
    });
});
// ahora quiero mensaje de alerta con swwetalert2
// script.js
document.addEventListener('DOMContentLoaded', function () {
    // Aquí puedes manejar mensajes de alerta
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('error')) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Usuario o contraseña están vacíos.',
        });
    }
});

// alerta de ingreso a index

