globalThis.idsResidentesArray = [];
globalThis.eliminado = false;
var btnAbrirModal = document.getElementById("eliminarBoton");
var btnAbrirModalR = document.getElementById("eliminarBotonR");
var miModal = document.getElementById("miModal");
var cerrarModal = document.getElementById("cerrarModal");

//////////////////////////General//////////////////////////

// Cuando se hace clic en el botón, mostrar el modal
btnAbrirModal.onclick = function () {
    miModal.style.display = "block";
    idsResidentesArray = mostrarPagosSeleccionados();
    console.log(idsResidentesArray);

    if (idsResidentesArray == undefined) {
        document.querySelector('input[name="eliminarConfirmar"]').style.display = 'hidden';
    }
    else {
        document.querySelector('input[name="eliminarConfirmar"]').style.display = '';
    }
}

btnAbrirModalR.onclick = function () {
    console.log('Boton R');
    miModal.style.display = "block";
    idsResidentesArray = mostrarPagosSeleccionados();
    console.log(idsResidentesArray);

    if (idsResidentesArray == undefined) {
        document.querySelector('input[name="eliminarConfirmar"]').style.display = 'hidden';
    }
    else {
        document.querySelector('input[name="eliminarConfirmar"]').style.display = '';
    }
}

// Cuando se hace clic en el botón de cerrar, ocultar el modal
cerrarModal.onclick = function () {
    miModal.style.display = "none";
}

//Cuando se hace clic fuera del modal, ocultar el modal
window.onclick = function (event) {
    if (event.target == miModal) {
        miModal.style.display = "none";
    }
}

function eliminarArray() {
    var tablaElementos = document.getElementById('tablaElementos');
    var filasSeleccionadas = tablaElementos.querySelectorAll('tr.selected');

    filasSeleccionadas.forEach(function (fila) {
        var idPago = fila.getAttribute('idPago');
        idsResidentesArray.push(idPago);
    });

    console.log(idsResidentesArray);

    // Enviar los IDs de los pagos seleccionados al servidor PHP mediante AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Forms/eliminarPagos.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                eliminarPagos();
            } else {
                console.error('Error al eliminar pagos');
            }
        }
    };

    xhr.send(JSON.stringify({
        idsPagos: idsResidentesArray
    }));
    eliminado = true;
}

function eliminarPagos() {
    var idsPagosArray = JSON.parse(xhr.responseText);

    idsPagosArray.forEach(function (idPago) {
        var fila = document.getElementById(idPago);
        if (fila) {
            fila.remove();
        }
    });
}