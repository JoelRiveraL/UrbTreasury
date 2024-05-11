<?php
function validarCedulaEcuatoriana($cedula)
{
    if (!preg_match('/^\d{10}$/', $cedula)) {
        return false;
    }

    // Obtener los primeros 9 dígitos de la cédula
    $cedulaSinDigitoVerificador = substr($cedula, 0, 9);

    // Calcular el dígito verificador esperado
    $digitoVerificadorEsperado = calcularDigitoVerificador($cedulaSinDigitoVerificador);

    $digitoVerificadorIngresado = intval(substr($cedula, -1));

    // Comparar el dígito verificador ingresado con el esperado
    return $digitoVerificadorEsperado === $digitoVerificadorIngresado;
}

function calcularDigitoVerificador($cedulaSinDigitoVerificador)
{
    $coeficientes = array(2, 1, 2, 1, 2, 1, 2, 1, 2);

    $suma = 0;
    for ($i = 0; $i < 9; $i++) {
        $producto = $cedulaSinDigitoVerificador[$i] * $coeficientes[$i];
        $suma += ($producto >= 10) ? ($producto - 9) : $producto;
    }

    $residuo = $suma % 10;

    return ($residuo !== 0) ? (10 - $residuo) : $residuo;
}
