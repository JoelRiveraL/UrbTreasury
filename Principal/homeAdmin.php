<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Host System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Styles/styleIndex.css">
</head>

<body>
    <header>
        <section>
            <img src="../Images/LOGOCOPY.png" alt="" width="55px">
            <a href="#" class="logo">Bienvenida Patricia</a>
        </section>

        <input type="checkbox" id="menu">
        <label for="menu"><img class="menu-icono" src="../Images/menu.png" alt="" width="70px"></label>

        <nav class="navbar">
            <ul>
                <li><a href="homeAdmin.php">INICIO</a></li>
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
    <section id="banner">
        <section>
            <h2>Urbanización Profesores de la<br>Escuela Politécnica Nacional</h2>
            <p>Un lugar para llamar hogar</p>
        </section>
    </section>
    <section class="home">

        <section id="contenidoPrincipal">
            <section class="contenidoHorizontal">
                <a href="../Principal/busquedaP.php">
                    <article>
                        <div class="front">
                            <center><img src="../Images/READ.png" alt="logo" width="80px" height="80px"></center>
                            <h3> Búsqueda </h3>
                        </div>
                        <div class="back">
                            <p> Usted podrá visualizar los habitantes de la Urbanización (residentes y administradores). Además, podrá ver y editar los pagos realizados por los residentes a manera de búsqueda.
                            </p>
                        </div>
                    </article>
                </a>
                <a href="../Principal/registroPagos.php">
                    <article>
                        <div class="front">
                            <center><img src="../Images/CREATE.png" alt="logo" width="80px" height="80px"></center>
                            <h3> Registro </h3>
                        </div>
                        <div class="back">
                            <p>Usted puede registrar nuevos habitantes, los cuales podrán crear su cuenta individual. Además, puede Registrar los distintos aportes realizados y visualizar el registro financiero. </p>
                        </div>
                    </article>
                </a>
                <a href="../Principal/comentarios.php">
                    <article>
                        <div class="front">
                            <center><img src="../Images/COMMENT.png" alt="logo" width="80px" height="80px"></center>
                            <h3> Comentarios </h3>
                        </div>
                        <div class="back">
                            <p> Usted podrá ver los comentarios que le envíen los residentes, como medio de comunicación entre residentes y administrador para mejorar la gestión de pagos en la Urbanización.
                            </p>
                        </div>
                    </article>
                </a>
                <a href="../Principal/soporte.php">
                    <article>
                        <div class="front">
                            <center><img src="../Images/SOPORTE.png" alt="logo" width="80px" height="80px"></center>
                            <h3> Soporte </h3>
                        </div>
                        <div class="back">
                            <p> Usted podrá almacenar la información de los servicios prestados a la Urbanización como un medio de contacto directo, como el sistema de alarmas y desarrolladores del sistema. </p>
                        </div>
                    </article>
                </a>
            </section><br>
            <section>
                <table>
                    <tr class="header-row">
                        <td>Nombre</td>
                        <td>Tipo</td>
                        <td>Fecha</td>
                    </tr>
                    <?php
                    include '../Forms/conexionMySql.php';

                    $sqlPago = "SELECT * FROM pago 
                    INNER JOIN residente ON pago.residenteP = residente.cedulaR 
                    ORDER BY fechaP DESC";
                    $resultPago = $conn->query($sqlPago);

                    $index = 0;

                    if ($resultPago->num_rows > 0) {
                        while ($row = $resultPago->fetch_assoc()) {
                            if ($index < 5) {
                                $rowClass = ($index % 2 == 0) ? 'even-row' : 'odd-row';
                                echo "<tr class='$rowClass'>";
                                echo "<td>" . $row["nombreR"] . "</td>";
                                echo "<td>" . $row["tipoP"] . "</td>";
                                echo "<td>" . $row["fechaP"] . "</td>";
                                echo "</tr>";
                                $index++;
                            }
                        }
                    } else {
                        echo "<p>No se encontraron resultados</p><br>";
                    }
                    ?>
                </table>
            </section>
        </section>
        <aside>
            <section id="Notes">
                <h3>Notificaciones</h3>
                <hr>
                <?php
                include '../Forms/conexionMySql.php';

                // Obtener la fecha de hoy en el formato 'YYYY-MM-DD'
                $fecha_hoy = date("Y-m-d");

                // Consulta SQL para seleccionar solo los comentarios de la fecha de hoy
                $sql = "SELECT * FROM comentarios WHERE fechaC = '$fecha_hoy' ORDER BY fechaC DESC LIMIT 4";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<article>";
                        echo "<p>Tiene una notificación de: " . $row["usuarioResC"] . ", Nombre:  " . $row["nombreResC"] . "</p><br>";
                        echo "</article>";
                        echo "<hr>";
                    }
                } else {
                    echo "<article>";
                    echo "<p>No tiene notificaciones recientes para hoy</p><br>";
                    echo "</article>";
                    echo "<hr>";
                }

                ?>
                <br>
                <center><img src="../Images/LogoNotificaciones.jpg" width="80%"></center>
            </section>
        </aside>
    </section>

    <footer class="footer">
        <section class="copyR">
            <p>Copyright © 2024 Urbanization Treasury</p>
        </section>

    </footer>
    <script src="../Script/index.js"></script>

</body>

</html>