globalThis.pagosEditar = [];
globalThis.eliminado = false;
var btnAbrirModalModificarPago = document.getElementById("modificarBoton");
var btnAbrirModalModificarPagoR = document.getElementById("modificarBotonR");
var miModalModificarPago = document.getElementById("miModalModificar");
var cerrarModalModificarPago = document.getElementById("cerrarModalModificar");
var eliminarConfirmarModificarPago = document.getElementById("modificarConfirmar");

//////////////////////////General//////////////////////////

// Cuando se hace clic en el botón, mostrar el modal
btnAbrirModalModificarPago.onclick = function () {
    miModalModificarPago.style.display = "block";
    pagosEditar = mostrarPagosSeleccionadosEdit();
    console.log(pagosEditar);

    if (pagosEditar == undefined) {
        document.querySelector('input[name="modificarConfirmar"]').style.display = 'hidden';
    }
    else {
        document.querySelector('input[name="modificarConfirmar"]').style.display = '';
    }
}

btnAbrirModalModificarPagoR.onclick = function () {
    miModalModificarPago.style.display = "block";
    pagosEditar = mostrarPagosSeleccionadosEdit();
    console.log(pagosEditar);

    if (pagosEditar == undefined) {
        document.querySelector('input[name="modificarConfirmar"]').style.display = 'hidden';
    }
    else {
        document.querySelector('input[name="modificarConfirmar"]').style.display = '';
    }
}

cerrarModalModificarPago.onclick = function () {
    miModalModificarPago.style.display = "none";
}

//Cuando se hace clic fuera del modal, ocultar el modalA
window.onclick = function (event) {
    if (event.target == miModalModificarPago) {
        miModalModificarPago.style.display = "none";
    }
}

function editarArray() {
    console.log(pagosEditar);

    pagosEditar.shift();

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Forms/modificarPagos.php", true);
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
        editsPagos: pagosEditar
    }));
    modificado = true;
}