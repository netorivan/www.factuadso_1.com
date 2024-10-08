
// script de sweetalert2

function mostrarAlertaCamposVacios() {
    Swal.fire({
        icon: 'warning',
        title: 'Campos Vacíos',
        text: 'Por favor, completa todos los campos.',
        confirmButtonText: 'Aceptar'
    });
}

function mostrarAlertaCamposLlenos() {
    Swal.fire({
        icon: 'info',
        title: 'Campos Llenos',
        text: 'Los campos están completos.',
        confirmButtonText: 'Aceptar'
    });
}
