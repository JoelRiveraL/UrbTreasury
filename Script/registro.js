
function validarNumeros(e) {
    var entrada = e.key;
    if (!/^\d+$/.test(entrada)) {
        e.preventDefault();
    }
}

function validarFormulario() {
    var tipoPago = document.getElementsByName("tipo_pago")[0].value;
    if (tipoPago === "") {
        alert("Por favor, seleccione el tipo de pago.");
        return false;
    }
    return true;
}