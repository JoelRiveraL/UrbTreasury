globalThis.residenteEditar = [];
globalThis.eliminado = false;
var btnAbrirModalModificarPago = document.getElementById("modificarBoton");
var btnAbrirModalModificarPagoR = document.getElementById("modificarBotonR");
var miModalModificarResidente = document.getElementById("miModalModificar");
var cerrarModalModificarPago = document.getElementById("cerrarModalModificar");
var eliminarConfirmarModificarPago = document.getElementById("modificarConfirmar");

//////////////////////////General//////////////////////////

// Cuando se hace clic en el botón, mostrar el modal
btnAbrirModalModificarPago.onclick = function () {
    miModalModificarResidente.style.display = "block";
    residenteEditar = mostrarResidentesSeleccionadosEdit();
    console.log(residenteEditar);

    if (residenteEditar == undefined) {
        document.querySelector('input[name="modificarConfirmar"]').style.display = 'hidden';
    }
    else {
        document.querySelector('input[name="modificarConfirmar"]').style.display = '';
    }
}

btnAbrirModalModificarPagoR.onclick = function () {
    miModalModificarResidente.style.display = "block";
    residenteEditar = mostrarResidentesSeleccionadosEdit();
    console.log(residenteEditar);

    if (residenteEditar == undefined) {
        document.querySelector('input[name="modificarConfirmar"]').style.display = 'hidden';
    }
    else {
        document.querySelector('input[name="modificarConfirmar"]').style.display = '';
    }
}

cerrarModalModificarPago.onclick = function () {
    miModalModificarResidente.style.display = "none";
}

//Cuando se hace clic fuera del modal, ocultar el modalA
window.onclick = function (event) {
    if (event.target == miModalModificarPago) {
        miModalModificarResidente.style.display = "none";
    }
}

function editarArray() {
    console.log(residenteEditar);

    residenteEditar.shift();

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Forms/modificarResidentes.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error('Error al modificar pagos');
            }
        }
    };

    xhr.send(JSON.stringify({
        editsRes: residenteEditar
    }));
    modificado = true;
}