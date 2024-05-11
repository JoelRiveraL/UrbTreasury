globalThis.idSoporteGeneral = null;
var btnAbrirModal = document.getElementById("crearSupport");

var miModalSupport = document.getElementById("miModalSupport");
var miModalSupportDelete = document.getElementById("miModalSupportDelete");

var cerrarModalSupport = document.getElementById("cerrarModalSupport");

// Cuando se hace clic en el botón, mostrar el modal
btnAbrirModal.onclick = function () {
    miModalSupport.style.display = "block";
}

function mostrarModalEliminar(id) {
    miModalSupportDelete.style.display = "block";
    idSoporteGeneral = id;

    console.log(idSoporteGeneral);
}

cerrarModalSupport.onclick = function () {
    miModalSupport.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == miModalSupport) {
        miModalSupport.style.display = "none";
    }
}

function crearDatosSupport() {

    var soporte = [];

    var nombre = document.getElementById('nombreSoporte').value;
    var telefono = document.getElementById('telefonoSoporte').value;
    var email = document.getElementById('correoSoporte').value;
    var nombreEncargado = document.getElementById('nombreEncargadoSoporte').value;
    var descripcion = document.getElementById('descripcionSoporte').value;

    for (var i = 0; i < 5; i++) {
        if (nombre == "" || telefono == "" || email == "" || nombreEncargado == "" || descripcion == "") {
            alert('Por favor, llene todos los campos');
            return;
        }
        else {
            soporte.push(nombre, telefono, email, nombreEncargado, descripcion);
        }
    }

    // Enviar los IDs de los pagos seleccionados al servidor PHP mediante AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Forms/ingresoSoporte.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                alert('Soporte ingresado correctamente');
            } else {
                console.error('Error al ingresar soporte');
            }
        }
    };

    xhr.send(JSON.stringify({
        soporteData: soporte
    }));
}

function eliminarDatosSupport() {
    // Enviar los IDs de los pagos seleccionados al servidor PHP mediante AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Forms/eliminarSoporte.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                alert('Soporte eliminado correctamente');
            } else {
                console.error('Error al ingresar soporte');
            }
        }
    };

    xhr.send(JSON.stringify({
        idSoporteBorrar: idSoporteGeneral
    }));
}


document.getElementById('nombreSoporte').addEventListener('input', function () {
    this.value = this.value.replace(/[^a-zA-Z]/g, ''); // Permitir solo letras
    this.value = this.value.replace(/[0-9]/g, ''); // Eliminar números
});

document.getElementById('nombreEncargadoSoporte').addEventListener('input', function () {
    this.value = this.value.replace(/[^a-zA-Z]/g, ''); // Permitir solo letras
    this.value = this.value.replace(/[0-9]/g, ''); // Eliminar números
});

document.getElementById('telefonoSoporte').addEventListener('input', function () {
    this.value = this.value.replace(/[^0-9]/g, ''); // Permitir solo números
});
