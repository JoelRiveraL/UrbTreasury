<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda Residente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Styles/styleBusquedaR.css">
    <script src="../Script/seleccionarRow.js"></script>
</head>

<body>
    <header>
        <section>
            <img src="../Images/LOGOCOPY.png" alt="" width="55px">
            <a href="#" class="logo">Búsqueda Residente</a>
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

    <section>
        <br><br><br><br><br><br>
        <div id="miModalModificar" class="modalModificar">
            <div class="modal-Modificar-contenido">
                <span class="cerrar-Modificar-modal" id="cerrarModalModificar"></span>
                <h2>Tabla de elementos a editar</h2>
                <br>
                <div id="tablaElementosEdit"></div>
                <br>
                <form id="modificar-form" method="POST">
                    <input type="submit" value="Confirmar" name="modificarConfirmar" onclick="editarArray()">
                    <input type="submit" value="Cancelar" name="rechazarConfirmar">
                </form>
            </div>
        </div>
        <div id="miModal" class="modal">
            <div class="modal-contenido">
                <span class="cerrar-modal" id="cerrarModal"></span>
                <h2>Tabla de elementos a borrar</h2>
                <br>
                <div id="tablaElementos"></div>
                <br>
                <form id="eliminar-form" method="POST">
                    <input type="submit" value="Confirmar" name="eliminarConfirmar" onclick="eliminarArray()">
                    <input type="submit" value="Cancelar" name="rechazarConfirmar">
                </form>
            </div>
        </div>
        <section class="resumen"><br><br>
            <!-- RESUMEN SEMANAL DE LOS RESIDENTES -->
            <h2>Resumen General de residentes</h2><br>
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
            <br><br>
            <form id="eliminarBotonGenerarTabla" method="POST">
                <input type="hidden" name="idPago" id="idPago">
                <input type="button" value="Eliminar" name="eliminarBoton" id="eliminarBoton">
                <input type="button" value="Editar" name="modficarBoton" id="modificarBoton">
            </form>
            <script src="../Script/tablasEResidentes.js"></script>
            <script src="../Script/tablasModificarResidentes.js"></script>
            <?php
            if (isset($_POST['eliminarConfirmar'])) {
                echo "<script>alert('Residentes eliminados exitosamente');</script>";
                echo "<script>window.location = window.location;</script>";
            }
            ?>
        </section><br>
        <section class="resumen">
            <!-- RESIDENTE ESPECIFICO -->
            <h2>Resumen de Residente</h2><br>
            <section id="consultasBusquedaPagos">
                <form method="post">
                    <input type="text" name="cedula" id="cedula" placeholder="Ingrese el cedula del residente a buscar" required>
                    <input type="submit" name="buscarR" value="Buscar">
                </form><br />
                <form method="post">
                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del residente a buscar" required>
                    <input type="submit" name="buscarRNombre" value="Buscar">
                </form><br />
            </section><br />
            <table id="resumen-residente">
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
                if (isset($_POST['buscarR'])) {
                    include '../Forms/conexionMySql.php';
                    $id = $_POST['cedula'];

                    $sqlPago = "SELECT residente.*, residente.nombreR 
                                FROM residente
                                WHERE residente.cedulaR = $id";

                    $resultPago = $conn->query($sqlPago);
                    $index = 0;

                    if ($resultPago->num_rows > 0) {
                        while ($row = $resultPago->fetch_assoc()) {
                            if ($index < 10) {
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
                    echo "<script>window.location = '#resumen-residente';</script>";
                } else if (isset($_POST['buscarRNombre'])) {

                    include '../Forms/conexionMySql.php';
                    $nombre = $_POST['nombre'];

                    // Escapar y citar el nombre para evitar inyección SQL
                    $nombre = $conn->real_escape_string($nombre);

                    $sqlPago = "SELECT residente.*, residente.nombreR 
                                FROM residente
                                WHERE residente.nombreR = '$nombre'";

                    $resultPago = $conn->query($sqlPago);
                    $index = 0;

                    if ($resultPago->num_rows > 0) {
                        while ($row = $resultPago->fetch_assoc()) {
                            if ($index < 10) {
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
                    echo "<script>window.location = '#resumen-residente';</script>";
                }
                ?>
            </table><br><br>
            <?php
            if (isset($_POST['buscarR']) || isset($_POST['buscarRNombre'])) {
                echo '<form id="eliminarBotonGenerarTabla" method="POST">';
                echo '<input type="hidden" name="idPago" id="idPago">';
                echo '<input type="button" value="Eliminar" name="eliminarBoton" id="eliminarBotonR">';
                echo '<input type="button" value="Editar" name="modficarBoton" id="modificarBotonR">';
                echo '</form>';
                echo '<script src="../Script/tablasEResidentes.js"></script>';
                echo '<script src="../Script/tablasModificarResidentes.js"></script>';
            }
            ?>
        </section><br><br><br>
        <footer>
            <section class="copyR">
                <p>Copyright©2023 Urbanization Treasury </p>
            </section>
        </footer>
    </section>
</body>

</html>