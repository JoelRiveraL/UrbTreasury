document.addEventListener('DOMContentLoaded', function () {
    asignarEventoClick();
});

function asignarEventoClick() {
    var filas = document.querySelectorAll('tr[data-id]');

    filas.forEach(function (fila) {
        fila.addEventListener('click', function (event) {

            // Alternar la clase 'selected' para cambiar el estado de selección
            if (this.classList.contains('selected')) {
                this.classList.remove('selected');
                this.style.backgroundColor = '';
                this.style.color = '';
            } else {
                this.classList.add('selected');
                this.style.backgroundColor = '#2e6594';
                this.style.color = '#ffffff';
            }

            // Prevenir la propagación del evento para evitar que el clic en la fila afecte a otras filas
            event.stopPropagation();

        });
    });
}

/* ======================== ELIMINAR ======================== */

function mostrarPagosSeleccionados() {
    var tablaElementos = document.getElementById('tablaElementos');
    tablaElementos.innerHTML = ''; // Limpiar contenido anterior

    var filasSeleccionadas = document.querySelectorAll('tr.selected');
    if (filasSeleccionadas.length > 0) {
        var tablaHTML = '<table>';
        tablaHTML += '<tr class="header-row"><th>ID Pago</th><th>Cedula</th><th>Apellido</th><th>Fecha</th><th>Monto</th><th>Tipo</th><th>Observacion</th></tr>';

        var idsPagosArray = [];

        filasSeleccionadas.forEach(function (fila) {
            var idPago = fila.getAttribute('data-id');
            idsPagosArray.push(idPago);
            var cedula = fila.querySelector('.cedula').innerText;
            var nombre = fila.querySelector('.nombre').innerText;
            var fecha = fila.querySelector('.fecha').innerText;
            var monto = fila.querySelector('.monto').innerText;
            var tipo = fila.querySelector('.tipo').innerText;
            var observacion = fila.querySelector('.observacion').innerText;

            var index = 0;
            var rowClass = (index % 2 === 0) ? 'even-row' : 'odd-row';

            tablaHTML += '<tr class="' + rowClass + '">';
            tablaHTML += '<td>' + idPago + '</td>';
            tablaHTML += '<td>' + cedula + '</td>';
            tablaHTML += '<td>' + nombre + '</td>';
            tablaHTML += '<td>' + fecha + '</td>';
            tablaHTML += '<td>' + monto + '</td>';
            tablaHTML += '<td>' + tipo + '</td>';
            tablaHTML += '<td>' + observacion + '</td>';
            tablaHTML += '</tr>';

            index++;
        });

        tablaHTML += '</table>';
        tablaElementos.innerHTML = tablaHTML;
        return idsPagosArray;
    } else {
        tablaElementos.innerHTML = '<p>No hay elementos seleccionados</p>';
        document.querySelector('input[name="eliminarConfirmar"]').style.display = 'none';
        return idsPagosArray;
    }
}


function mostrarPagosSeleccionadosResidentes() {
    var tablaElementosResidente = document.getElementById('tablaElementosResidente');
    tablaElementosResidente.innerHTML = ''; // Limpiar contenido anterior

    var filasSeleccionadas = document.querySelectorAll('tr.selected');
    if (filasSeleccionadas.length > 0) {
        var tablaHTML = '<table>';
        tablaHTML += '<tr class="header-row"><th>ID Pago</th><th>Cedula</th><th>Apellido</th><th>Fecha</th><th>Monto</th><th>Tipo</th><th>Observacion</th></tr>';

        var idsPagosArrayResidet = [];

        filasSeleccionadas.forEach(function (fila) {
            var idPago = fila.getAttribute('data-id');
            idsPagosArrayResidet.push(idPago);
            var cedula = fila.querySelector('.cedula').innerText;
            var nombre = fila.querySelector('.nombre').innerText;
            var fecha = fila.querySelector('.fecha').innerText;
            var monto = fila.querySelector('.monto').innerText;
            var tipo = fila.querySelector('.tipo').innerText;
            var observacion = fila.querySelector('.observacion').innerText;

            var index = 0;
            var rowClass = (index % 2 === 0) ? 'even-row' : 'odd-row';

            tablaHTML += '<tr class="' + rowClass + '">';
            tablaHTML += '<td>' + idPago + '</td>';
            tablaHTML += '<td>' + cedula + '</td>';
            tablaHTML += '<td>' + nombre + '</td>';
            tablaHTML += '<td>' + fecha + '</td>';
            tablaHTML += '<td>' + monto + '</td>';
            tablaHTML += '<td>' + tipo + '</td>';
            tablaHTML += '<td>' + observacion + '</td>';
            tablaHTML += '</tr>';

            index++;
        });

        tablaHTML += '</table>';
        tablaElementosResidente.innerHTML = tablaHTML;
        return idsPagosArrayResidet;
    } else {
        tablaElementosResidente.innerHTML = '<p>No hay elementos seleccionados</p>';
        var eliminarConfirmar = document.getElementById("eliminarConfirmar");
        eliminarConfirmar.style.display = 'none';
        return idsPagosArrayResidet;
    }
}



function mostrarResidentesSeleccionados() {
    var tablaElementos = document.getElementById('tablaElementos');
    tablaElementos.innerHTML = ''; // Limpiar contenido anterior

    var filasSeleccionadas = document.querySelectorAll('tr.selected');
    if (filasSeleccionadas.length > 0) {
        var tablaHTML = '<table>';
        tablaHTML += '<tr class="header-row"><th>ID Residente</th><th>Cedula</th><th>Apellido</th><th>Apellido</th><th>Correo</th><th>Telefono</th><th>Lote</th></tr>';

        var idsResidentesArray = [];

        filasSeleccionadas.forEach(function (fila) {
            var idResidentes = fila.getAttribute('data-id');
            idsResidentesArray.push(idResidentes);
            var cedula = fila.querySelector('.cedula').innerText;
            var nombre = fila.querySelector('.nombre').innerText;
            var apellido = fila.querySelector('.apellido').innerText;
            var correo = fila.querySelector('.correo').innerText;
            var telefono = fila.querySelector('.telefono').innerText;
            var lote = fila.querySelector('.lote').innerText;

            var index = 0;
            var rowClass = (index % 2 === 0) ? 'even-row' : 'odd-row';

            tablaHTML += '<tr class="' + rowClass + '">';
            tablaHTML += '<td>' + idResidentes + '</td>';
            tablaHTML += '<td>' + cedula + '</td>';
            tablaHTML += '<td>' + nombre + '</td>';
            tablaHTML += '<td>' + apellido + '</td>';
            tablaHTML += '<td>' + correo + '</td>';
            tablaHTML += '<td>' + telefono + '</td>';
            tablaHTML += '<td>' + lote + '</td>';
            tablaHTML += '</tr>';

            index++;
        });

        tablaHTML += '</table>';
        tablaElementos.innerHTML = tablaHTML;
        return idsResidentesArray;
    } else {
        tablaElementos.innerHTML = '<p>No hay elementos seleccionados</p>';
        /*Ocultar botones confirmar y rechazar*/
        document.querySelector('input[name="eliminarConfirmar"]').style.display = 'none';
        return idsResidentesArray;
    }
}

function mostrarResidenteSeleccionadosResidentes() {
    var tablaElementos = document.getElementById('tablaElementosResidente');
    tablaElementos.innerHTML = ''; // Limpiar contenido anterior

    var filasSeleccionadas = document.querySelectorAll('tr.selected');
    if (filasSeleccionadas.length > 0) {
        var tablaHTML = '<table>';
        tablaHTML += '<tr class="header-row"><th>ID Residente</th><th>Cedula</th><th>Apellido</th><th>Apellido</th><th>Correo</th><th>Telefono</th><th>Lote</th></tr>';

        var idsResidentesArray = [];

        filasSeleccionadas.forEach(function (fila) {
            var idResidentes = fila.getAttribute('data-id');
            idsResidentesArray.push(idResidentes);
            var cedula = fila.querySelector('.cedula').innerText;
            var nombre = fila.querySelector('.nombre').innerText;
            var apellido = fila.querySelector('.apellido').innerText;
            var correo = fila.querySelector('.correo').innerText;
            var telefono = fila.querySelector('.telefono').innerText;
            var lote = fila.querySelector('.lote').innerText;

            var index = 0;
            var rowClass = (index % 2 === 0) ? 'even-row' : 'odd-row';

            tablaHTML += '<tr class="' + rowClass + '">';
            tablaHTML += '<td>' + idResidentes + '</td>';
            tablaHTML += '<td>' + cedula + '</td>';
            tablaHTML += '<td>' + nombre + '</td>';
            tablaHTML += '<td>' + apellido + '</td>';
            tablaHTML += '<td>' + correo + '</td>';
            tablaHTML += '<td>' + telefono + '</td>';
            tablaHTML += '<td>' + lote + '</td>';
            tablaHTML += '</tr>';

            index++;
        });

        tablaHTML += '</table>';
        tablaElementos.innerHTML = tablaHTML;
        return idsResidentesArray;
    } else {
        tablaElementos.innerHTML = '<p>No hay elementos seleccionados</p>';
        var eliminarConfirmar = document.getElementById("eliminarConfirmar");
        eliminarConfirmar.style.display = 'none';
        return idsResidentesArray;
    }
}


/** ======================== EDICION ======================== **/

/* PAGOS */

function mostrarPagosSeleccionadosEdit() {
    var tablaElementos = document.getElementById('tablaElementosEdit');
    tablaElementos.innerHTML = ''; // Limpiar contenido anterior

    var filasSeleccionadas = document.querySelectorAll('tr.selected');
    if (filasSeleccionadas.length > 0) {
        var tablaHTML = '<table>';
        tablaHTML += '<tr class="header-row"><th>ID Pago</th><th>Cedula</th><th>Apellido</th><th>Fecha</th><th>Monto</th><th>Tipo</th><th>Observacion</th></tr>';

        var PagosArray = [];

        filasSeleccionadas.forEach(function (fila) {
            var idPago = fila.getAttribute('data-id');
            var cedula = fila.querySelector('.cedula').innerText;
            var nombre = fila.querySelector('.nombre').innerText;
            var fecha = fila.querySelector('.fecha').innerText;
            var monto = fila.querySelector('.monto').innerText;
            var tipo = fila.querySelector('.tipo').innerText;
            var observacion = fila.querySelector('.observacion').innerText;

            // Guardar los datos en el array
            var pago = [idPago, cedula, nombre, fecha, monto, tipo, observacion];
            PagosArray.push(pago);

            // Construir la fila de la tabla con campos editables
            tablaHTML += '<tr>';
            tablaHTML += '<td>' + idPago + '</td>';
            tablaHTML += '<td contenteditable>' + cedula + '</td>';
            tablaHTML += '<td>' + nombre + '</td>';
            tablaHTML += '<td><input type="date" value="' + fecha + '"></td>';
            tablaHTML += '<td><input type="number" value="' + monto + '"></td>';
            tablaHTML += '<td><select><option value="' + tipo + '">' + tipo + '</option><option value="Alicuota">Alicuota</option><option value="Extraordinario">Extraordinario</option><option value="Control">Control</option><option value="Tarjeta">Tarjeta</option></select></td>';
            tablaHTML += '<td contenteditable>' + observacion + '</td>';
            tablaHTML += '</tr>';
        });

        tablaHTML += '</table>';
        tablaElementos.innerHTML = tablaHTML;

        // Agregar evento de escucha para la validación en tiempo real de la cédula
        tablaElementos.querySelectorAll('[contenteditable]').forEach(function (editableCell) {
            editableCell.addEventListener('input', function () {
                var cedulaActual = this.innerText.trim();

                if (!validarCedulaEcuatoriana(cedulaActual)) {
                    this.style.backgroundColor = 'red';
                    document.querySelector('input[name="modificarConfirmar"]').style.display = 'none';
                } else {
                    this.style.backgroundColor = '';
                    document.querySelector('input[name="modificarConfirmar"]').style.display = '';
                }
            });
        });

        // Agregar eventos de escucha para los otros tipos de entrada
        tablaElementos.querySelectorAll('input[type="date"], input[type="number"], select').forEach(function (input) {
            input.addEventListener('change', function () {
                actualizarArrayDesdeTabla(PagosArray);
            });
        });

        return PagosArray;
    } else {
        tablaElementos.innerHTML = '<p>No hay elementos seleccionados</p>';
        document.querySelector('input[name="modificarConfirmar"]').style.display = 'none';
        return PagosArray;
    }
}

/* RESIDENTES */

function mostrarResidentesSeleccionadosEdit() {
    var tablaElementos = document.getElementById('tablaElementosEdit');
    tablaElementos.innerHTML = ''; // Limpiar contenido anterior

    var filasSeleccionadas = document.querySelectorAll('tr.selected');
    if (filasSeleccionadas.length > 0) {
        var tablaHTML = '<table>';
        tablaHTML += '<tr class="header-row"><th>ID Residente</th><th>Cedula</th><th>Apellido</th><th>Apellido</th><th>Correo</th><th>Telefono</th><th>Lote</th></tr>';

        var ResArray = [];

        filasSeleccionadas.forEach(function (fila) {
            var idRes = fila.getAttribute('data-id');
            var cedula = fila.querySelector('.cedula').innerText;
            var nombre = fila.querySelector('.nombre').innerText;
            var apellido = fila.querySelector('.apellido').innerText;
            var correo = fila.querySelector('.correo').innerText;
            var telefono = fila.querySelector('.telefono').innerText;
            var lote = fila.querySelector('.lote').innerText;

            // Guardar los datos en el array
            var residente = [idRes, cedula, nombre, apellido, correo, telefono, lote];
            ResArray.push(residente);

            // Construir la fila de la tabla con campos editables
            tablaHTML += '<tr>';
            tablaHTML += '<td>' + idRes + '</td>';
            tablaHTML += '<td>' + cedula + '</td>';
            tablaHTML += '<td><input type="text" class="textMod" value="' + nombre + '"></td>';
            tablaHTML += '<td><input type="text" class="textMod" value="' + apellido + '"></td>';
            tablaHTML += '<td><input type="email" value="' + correo + '"></td>';
            tablaHTML += '<td><input type="tel" value="' + telefono + '"></td>';
            tablaHTML += '<td><input type="text" class="textMod" value="' + lote + '"></td>';
            tablaHTML += '</tr>';
        });

        tablaHTML += '</table>';
        tablaElementos.innerHTML = tablaHTML;

        // Agregar evento de escucha para la validación en tiempo real de la cédula
        tablaElementos.querySelectorAll('input.cedula').forEach(function (inputCedula) {
            inputCedula.addEventListener('input', function () {
                var cedulaActual = this.value.trim();

                if (!validarCedulaEcuatoriana(cedulaActual)) {
                    this.style.backgroundColor = 'red';
                    document.querySelector('input[name="modificarConfirmar"]').style.display = 'none';
                } else {
                    this.style.backgroundColor = '';
                    document.querySelector('input[name="modificarConfirmar"]').style.display = '';
                }
            });
        });

        // Agregar eventos de escucha para los otros tipos de entrada
        tablaElementos.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"]').forEach(function (input) {
            input.addEventListener('change', function () {
                actualizarArrayDesdeTabla(ResArray);
            });
        });

        return ResArray;
    } else {
        tablaElementos.innerHTML = '<p>No hay elementos seleccionados</p>';
        document.querySelector('input[name="modificarConfirmar"]').style.display = 'none';
        return ResArray;
    }
}

function actualizarArrayDesdeTabla(ArrayPR) {
    var tablaElementos = document.getElementById('tablaElementosEdit');
    var filas = tablaElementos.querySelectorAll('tr');

    ArrayPR.length = 0;

    filas.forEach(function (fila) {
        var rowData = [];
        fila.querySelectorAll('td').forEach(function (cell) {
            if (cell.querySelector('input')) {
                rowData.push(cell.querySelector('input').value.trim());
            } else if (cell.querySelector('select')) {
                rowData.push(cell.querySelector('select').value.trim());
            } else {
                rowData.push(cell.innerText.trim());
            }
        });
        ArrayPR.push(rowData);
    });

    console.log(ArrayPR);
}

function validarCedulaEcuatoriana(cedula) {
    if (!/^\d{10}$/.test(cedula)) {
        return false;
    }

    var cedulaSinDigitoVerificador = cedula.substring(0, 9);

    var digitoVerificadorEsperado = calcularDigitoVerificador(cedulaSinDigitoVerificador);

    var digitoVerificadorIngresado = parseInt(cedula.charAt(9));

    return digitoVerificadorEsperado === digitoVerificadorIngresado;
}

function calcularDigitoVerificador(cedulaSinDigitoVerificador) {
    var coeficientes = [2, 1, 2, 1, 2, 1, 2, 1, 2];

    var suma = 0;
    for (var i = 0; i < 9; i++) {
        var producto = parseInt(cedulaSinDigitoVerificador.charAt(i)) * coeficientes[i];
        suma += (producto >= 10) ? (producto - 9) : producto;
    }

    var residuo = suma % 10;

    return (residuo !== 0) ? (10 - residuo) : residuo;
}