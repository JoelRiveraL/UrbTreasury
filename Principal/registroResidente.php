<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Residentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Styles/styleRegistroR.css">
</head>

<body>
    <header>
        <section>
            <img src="../Images/LOGOCOPY.png" alt="" width="55px">
            <a href="#" class="logo">Registro Residentes</a>
        </section>

        <input type="checkbox" id="menu">
        <label for="menu"><img class="menu-icono" src="../Images/menu.png" alt="" width="70px"></label>

        <nav class="navbar">
            <ul>
                <li><a href="../Principal/homeAdmin.php">INICIO</a></li>
                <li><a href="#">BÚSQUEDA <img class="drop" src="../Images/drop.png" width="20px" alt=""></a>
                    <ul>
                        <li><a href="../Principal/busquedaR.php">Residentes</a></li>
                        <li><a href="../Principal/busquedaP.php">Pagos</a></li>
                    </ul>
                </li>
                <li><a href="#">REGISTRO <img class="drop" src="../Images/drop.png" width="20px" alt=""></a>
                    <ul>
                        <li><a href="../Principal/registroResidente.php">Residentes</a></li>
                        <li><a href="../Principal/registroPagos.php">Pagos</a></li>
                    </ul>
                </li>
                <li><a href="../Principal/comentarios.php">COMENTARIOS</a></li>
                <li><a href="../Principal/soporte.php">SOPORTE</a></li>
                <li><a href="../index.html">SALIR</a></li>
            </ul>

        </nav>
    </header>
    <br><br><br><br><br><br>
    <section>
        <section class="registro-container"><br>
            <section class="registro1">
                <!-- RESUMEN SEMANAL DE LOS PAGOS -->
                <h2>Residentes</h2>
                <form method="post">
                    <h3>Registro de residentes nuevos</h3>
                    <label> Cedula </label>
                    <input type="text" name="id" maxlength="10" onkeypress="validarNumeros(event)" placeholder="Ingrese la cedula del nuevo residente" required>
                    <label> Nombre </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese el Nombre del nuevo residente" required>
                    <label> Apellido </label>
                    <input type="text" name="apellido" id="apellido" placeholder="Ingrese el Apellido del nuevo residente" required>
                    <label> Correo Electrónico </label>
                    <input type="email" name="correo" placeholder="Ingrese el Correo del nuevo residente" required>
                    <label> Teléfono </label>
                    <input type="tel" name="telefono" maxlength="10" onkeypress="validarNumeros(event)" placeholder="Ingrese el Teléfono/Celular del nuevo residente" required>
                    <label> Lote </label>
                    <input type="text" name="departamento" placeholder="Ingrese el Número de Lote del nuevo residente" required>
                    <input type="submit" name="enviarResidente" value="Enviar">
                </form>
                <script src="../Script/Validaciones/validacionesEntradas.js"></script>
                <br><?php
                    include '../Forms/validarCedula.php';
                    include '../Forms/ingresoDatos.php';
                    include '../Forms/residenteExistente.php';

                    if (isset($_POST['enviarResidente'])) {
                        $id = $_POST["id"];
                        if (residenteExistente($id)) {
                            echo "<p style='color:red;'>Cedula ya registrada</p>";
                        } else {
                            if (validarCedulaEcuatoriana($id)) {
                                $nombre = $_POST["nombre"];
                                $apellido = $_POST["apellido"];
                                $correo = $_POST["correo"];
                                $telefono = $_POST["telefono"];
                                $departamento = $_POST["departamento"];

                                $mensaje = ingresoResidentes($id, $nombre, $apellido, $correo, $telefono, $departamento);

                                $ingresado = $_SESSION['ingresado'];
                                $enviado = $_SESSION['enviado'];

                                if ($enviado) {
                                    if ($ingresado) {
                                        echo "<p style='color:green;'>" . $mensaje . "</p>";

                                        /*$asuntoEmail = "Confirmación de Registro";
                                    $mensajeEmail = "Gracias por registrarte. Tu correo ha sido confirmado.";

                                    mail($correo, $asuntoEmail, $mensajeEmail);*/
                                    } else {
                                        echo "<p style='color:red;'>" . $mensaje . "</p>";
                                    }
                                    $_SESSION['enviado'] = false;
                                }
                            } else {
                                echo "<p style='color:red;'>Cedula no valida</p>";
                            }
                        }
                    } ?><br>
            </section><br><br>
            <section class="registro">
                <!-- RESUMEN SEMANAL DE LOS PAGOS -->
                <h2>Vista de Residentes</h2><br><br>
                <table id="resumen-general">
                    <tr class="header-row">
                        <th>ID Residente</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Lote</th>
                    </tr>
                    <?php
                    recargarTabla();
                    function recargarTabla()
                    {
                        include '../Forms/conexionMySql.php';
                        $sqlPago = "SELECT * FROM residente";
                        $resultPago = $conn->query($sqlPago);
                        $index = 0;

                        if ($resultPago->num_rows > 0) {
                            while ($row = $resultPago->fetch_assoc()) {
                                if ($index < 8) {
                                    $rowClass = ($index % 2 == 0) ? 'even-row' : 'odd-row';
                                    echo "<tr class='$rowClass' data-id='" . $row["idResidentes"] . "'>";
                                    echo "<td class='idResidentes'>" . $row["idResidentes"] . "</td>";
                                    echo "<td class='cedula'>" . $row["cedulaR"] . "</td>";
                                    echo "<td class='nombre'>" . $row["nombreR"] . "</td>";
                                    echo "<td class='apellido'>" . $row["apellidoR"] . "</td>";
                                    echo "<td class='correo'>" . $row["correoR"] . "</td>";
                                    echo "<td class='telefono'>" . $row["telefonoR"] . "</td>";
                                    echo "<td class='lote'>" . $row["loteR"] . "</td>";
                                    echo "</tr>";
                                    $index++;
                                }
                            }
                        } else {
                            echo "<p>No se encontraron resultados</p><br>";
                        }
                    }
                    ?>
                </table>
            </section>

        </section><br><br><br>

        <footer>
            <section class="copyR">
                <p>Copyright © 2024 Urbanization Treasury </p>
            </section>
        </footer>
    </section>
    <script src="../Script/registro.js"></script>
</body>

</html>