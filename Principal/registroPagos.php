<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Pagos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="../Styles/styleRegistroP.css">
</head>

<body>
    <header>
        <section>
            <img src="../Images/LOGOCOPY.png" alt="" width="55px">
            <a href="#" class="logo">Registro Pagos</a>
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
    <br><br><br><br><br>
    <section>
        <section class="registro-container"><br>
            <section class="registro">
                <!-- RESUMEN SEMANAL DE LOS PAGOS -->
                <h2>Pagos</h2>
                <form method="post">
                    <h3>Registro de pagos</h3>
                    <label for="id"> Cedula </label>
                    <input type="text" name="idConsulta" maxlength="10" onkeypress="validarNumeros(event)" id="id" placeholder="Ingrese la cedula del residente" value="<?php echo isset($_POST['idConsulta']) ? htmlspecialchars($_POST['idConsulta']) : ''; ?>" required>
                    <input type="hidden" name="presionadValidacion" value="1">
                    <input type="submit" name="idBuscar" id="id" value="Buscar">
                    <br><br>
                </form>
                <?php
                include '../Forms/conexionMySql.php';
                include '../Forms/validarCedula.php';

                if (isset($_POST['idBuscar'])) {
                    $id = $_POST["idConsulta"];

                    if (validarCedulaEcuatoriana($id)) {
                        $presionadValidacion = $_POST["presionadValidacion"];

                        // Cambia la consulta para buscar en la base de datos
                        $sql = "SELECT cedulaR, nombreR, apellidoR, loteR FROM residente WHERE cedulaR = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows === 1) {
                            $data = $result->fetch_assoc();

                            echo "<center>";
                            echo "<table>";
                            echo "<tr class='header-row'>";
                            echo "<th>ID</th>";
                            echo "<th>Nombre</th>";
                            echo "<th>Apellido</th>";
                            echo "<th>Lote</th>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>" . $data["cedulaR"] . "</td>";
                            echo "<td>" . $data["nombreR"] . "</td>";
                            echo "<td>" . $data["apellidoR"] . "</td>";
                            echo "<td>" . $data["loteR"] . "</td>";
                            echo "</tr>";
                            echo "</center>";

                            //$_SESSION['idResP'] = $id;
                            $revisar = true;
                            $id = $_POST["idConsulta"];
                        } else {
                            echo "<p style='color:red;'>Usuario no encontrado</p>";
                            $revisar = false;
                        }

                        $stmt->close();
                    } else {
                        echo "<p style='color:red;'>Cédula no válida</p>";
                        $revisar = false;
                        $presionadValidacion = false;
                    }
                }
                $conn->close();
                ?>

                <center>
                    <table>
                    </table>
                </center><br>
                <p>No recuerda la cedula?</p><br>
                <h3>Busqueda por nombre</h3>
                <form method="post" id="busquedaNoId" id="resultado-busqueda">
                    <label for="nombre"> Nombre </label>
                    <input type="text" name="nombreConsulta" id="nombre" placeholder="Ingrese el nombre del residente" value="<?php echo isset($_POST['nombreConsulta']) ? htmlspecialchars($_POST['nombreConsulta']) : ''; ?>" required>
                    <input type="hidden" name="presionadValidacion" value="1">
                    <input type="submit" name="idBuscarResidente" id="id" value="Buscar">
                    <br>
                </form>
                <?php
                include '../Forms/conexionMySql.php';

                if (isset($_POST['idBuscarResidente'])) {
                    $id = $_POST["nombreConsulta"];

                    $presionadValidacion = $_POST["presionadValidacion"];

                    // Cambia la consulta para buscar en la base de datos
                    $sql = "SELECT cedulaR, nombreR, apellidoR, loteR FROM residente WHERE nombreR = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows === 1) {
                        $data = $result->fetch_assoc();

                        echo "<center>";
                        echo "<table>";
                        echo "<tr class='header-row'>";
                        echo "<th>ID</th>";
                        echo "<th>Nombre</th>";
                        echo "<th>Apellido</th>";
                        echo "<th>Lote</th>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>" . $data["cedulaR"] . "</td>";
                        echo "<td>" . $data["nombreR"] . "</td>";
                        echo "<td>" . $data["apellidoR"] . "</td>";
                        echo "<td>" . $data["loteR"] . "</td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "</center>";

                        $revisar = true;
                    } else {
                        echo "<p style='color:red;'>Usuario no encontrado</p>";
                        $revisar = false;
                    }
                    $stmt->close();
                }

                // Cierra la conexión a la base de datos
                $conn->close();
                ?>
                <table></table><br>
                <script>
                    // Desplazar la página hacia abajo al contenedor de resultados de búsqueda
                    window.onload = function() {
                        var elemento = document.getElementById("resultado-busqueda");
                        if (elemento) {
                            elemento.scrollIntoView();
                        }
                    };
                </script>
                <form method="post"><br>
                    <label> Monto </label>
                    <input type="number" name="pagos" id="monto" placeholder="Ingrese el monto pagado por el residente" required>
                    <label> Tipo</label>
                    <select name="tipo_pago" required onsubmit="return validarFormulario()">
                        <option value="">Seleccione el tipo de pago</option>
                        <option value="Alicuota">Alicuota</option>
                        <option value="Extraordinario">Extraordinario</option>
                        <option value="Control">Control</option>
                        <option value="Tarjeta">Tarjeta</option>
                    </select>
                    <label> Fecha del Pago </label>
                    <input type="date" name="fecha" max="<?php echo date("Y-m-d"); ?>" min="2020-01-01" required>
                    <label> Observaciones </label>
                    <textarea name="observaciones" placeholder="Anote alguna observación por señalar al residente"></textarea>
                    <script src="../Script/Validaciones/validacionesEntradasP.js"></script>
                    <?php
                    if (isset($_POST['idBuscar'])) {
                        if ($presionadValidacion and $revisar) {
                            echo "<input type='submit' name='enviarBoton' value='Enviar'>";
                            if (isset($_POST['idBuscar']) && isset($id)) {
                                echo "<input type='hidden' name='idResP' value='$id'>";
                            }
                            echo "<br><p style='color:green;'>Usuario encontrado</p>";
                        } else {
                            echo "<br><p style='color:red;'>Usuario no encontrado</p>";
                        }
                    }
                    ?>

                </form>
                <?php
                include '../Forms/ingresarPagos.php';
                if (isset($_POST['enviarBoton'])) {
                    $id = $_POST["idResP"];
                    $pagos = $_POST["pagos"];
                    $fecha = $_POST["fecha"];
                    $tipo = $_POST["tipo_pago"];
                    $observaciones = $_POST["observaciones"];

                    $mensaje = ingresoPagos($pagos, $tipo, $fecha, $observaciones, $id);

                    $ingresadoPagos = $_SESSION['ingresadoPagos'];
                    $enviadoPagos = $_SESSION['enviadoPagos'];

                    if ($ingresadoPagos) {
                        if ($enviadoPagos) {
                            echo "<p style='color:green;'>" . $mensaje . "</p>";
                        } else {
                            echo "<p style='color:red;'>" . $mensaje . "</p>";
                        }
                        $_SESSION['enviadoPagos'] = false;
                    }
                }
                ?>
            </section><br><br>
            <section class="registro">
                <!-- RESUMEN SEMANAL DE LOS PAGOS -->
                <h3>Búsqueda de Ayuda</h3><br><br>
                <table id="resumen-general">
                    <tr class="header-row">
                        <th>ID Pago</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Tipo</th>
                        <th>Observacion</th>
                    </tr>
                    <?php
                    recargarTabla();
                    function recargarTabla()
                    {
                        include '../Forms/conexionMySql.php';
                        $sqlPago = "SELECT * FROM pago 
                INNER JOIN residente ON pago.residenteP = residente.cedulaR 
                ORDER BY fechaP DESC";
                        $resultPago = $conn->query($sqlPago);
                        $index = 0;

                        if ($resultPago->num_rows > 0) {
                            while ($row = $resultPago->fetch_assoc()) {
                                if ($index < 8) {
                                    $rowClass = ($index % 2 == 0) ? 'even-row' : 'odd-row';
                                    echo "<tr class='$rowClass' data-id='" . $row["idPago"] . "'>";
                                    echo "<td class='idPago'>" . $row["idPago"] . "</td>";
                                    echo "<td class='cedula'>" . $row["residenteP"] . "</td>";
                                    echo "<td class='nombre'>" . $row["nombreR"] . "</td>";
                                    echo "<td class='fecha'>" . $row["fechaP"] . "</td>";
                                    echo "<td class='monto'>" . $row["montoP"] . "</td>";
                                    echo "<td class='tipo'>" . $row["tipoP"] . "</td>";
                                    echo "<td class='observacion'>" . $row["observacionesP"] . "</td>";
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
                <br><br>
                <script src="../Script/calendario.js"></script>
                <h3>Calendario</h3><br>
                <!--Calendario no fue realizado por nosotros, fuente: 
    CodingNepal. (2022, September 22). Create a dynamic Calendar in HTML CSS & JavaScript | Calendar in JavaScript 
    [Video]. YouTube. https://www.youtube.com/watch?v=Z1BGAivZRlE
    -->
                <center>
                    <div class="wrapper">
                        <div class="headerCalendar">
                            <p class="current-date"></p>
                            <div class="icons">
                                <span id="prev" class="material-symbols-rounded">chevron_left</span>
                                <span id="next" class="material-symbols-rounded">chevron_right</span>
                            </div>
                        </div>
                        <div class="calendar">
                            <ul class="weeks">
                                <li>Sun</li>
                                <li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                            </ul>
                            <ul class="days"></ul>
                        </div>
                    </div>
                </center>
                <br><br>
            </section><br><br>
        </section><br><br>

        <footer>
            <section class="copyR">
                <p>Copyright © 2024 Urbanization Treasury </p>
            </section>
        </footer>
    </section>
    <script src="../Script/registro.js"></script>
</body>

</html>