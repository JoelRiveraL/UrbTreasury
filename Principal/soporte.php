<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Styles/styleSoporte.css">
</head>

<body>
    <header>
        <section>
            <img src="../Images/LOGOCOPY.png" alt="" width="55px">
            <a href="#" class="logo">Soporte</a>
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
    <br><br><br><br>
    <section>
        <section id="contenedorBCrearSup">
            <button id="crearSupport">
                <span>+ Nuevo</span>
            </button>
        </section>
        <div id="miModalSupport" class="modalSupport">
            <div class="modal-contenido-Support">
                <span class="cerrar-modal-Support" id="cerrarModalSupport"></span>
                <h2>Registrar nuevo soporte</h2>
                <br>
                <form id="formCrearSup">
                    <label>Entidad: </label>
                    <input type="text" name="nombreSoporte" id="nombreSoporte" placeholder="Ingrese el nombre de la entidad del nuevo soporte" required />
                    <br />
                    <label>Telefono:</label>
                    <input type="tel" name="telefonoSoporte" maxlength="10" id="telefonoSoporte" placeholder="Ingrese el telefono del nuevo soporte" required />
                    <br />
                    <label>Correo:</label>
                    <input type="email" name="correoSoporte" id="correoSoporte" placeholder="Ingrese el correo del nuevo soporte" required />
                    <br />
                    <label>Nombre encargado del soporte:</label>
                    <input type="text" name="nombreEncargadoSoporte" id="nombreEncargadoSoporte" placeholder="Ingrese el nombre de la persona encargada del soporte" required />
                    <br />
                    <label>Descripción: </label>
                    <textarea name="descripcionSoporte" id="descripcionSoporte" placeholder="Ingrese la descripción del nuevo soporte" required></textarea>
                </form>
                <form id="aceptar-form-support" method="POST">
                    <input type="submit" value="Aceptar" name="aceptarCrearSupport" onclick=crearDatosSupport()>
                    <input type="submit" value="Cancelar" name="cancelarCrearSupport">
                </form>
            </div>
        </div>
        <div id="miModalSupportDelete" class="modalSupportDelete">
            <div class="modal-contenido-Support-Delete">
                <span class="cerrar-modal-Support-Delete" id="cerrarModalSupportDelete"></span>
                <h2>Esta seguro de eliminar los datos?</h2>
                <br>
                <form id="aceptar-form-support" method="POST">
                    <input type="submit" value="Aceptar" name="aceptarCrearSupportDelete" onclick=eliminarDatosSupport()>
                    <input type="submit" value="Cancelar" name="cancelarCrearSupportDelete">
                </form>
            </div>
        </div>
        <br>
        <script src="../Script/botonSupport.js"></script>
        <?php
        if (isset($_SESSION['mensajeIngresadoSop'])) {
            echo "<script>alert('" . $_SESSION['mensajeIngresadoSop'] . "')</script>";
            unset($_SESSION['mensajeIngresadoSop']);
        }
        ?>
        <section>
            <section class="soporte-container">
                <section class="soporte">
                    <center><img src="../Images/Desarrolladores.png" alt="logo" width="80px" height="80px"></center>
                    <h2>Desarrolladores del Sistema</h2><br>
                    <h3>¿Tiene algún problema con el sistema?</h3><br>
                    <h3>¿Necesita algún cambio nuevo o Mantenimiento?</h3><br>
                    <h3>¡CONTÁCTENOS!</h3><br>
                    <a href="https://wa.me/1234567890" target="_blank">
                        <button class="wasa">
                            <i class="fa fa-whatsapp"></i>
                        </button>
                    </a>
                </section>
                <section class="soporte">
                    <center><img src="../Images/Alarmas.png" alt="logo" width="80px" height="80px"></center>
                    <h2>Sistema de Alarmas Contectado</h2><br>
                    <h3>¿Las alarmas han dejado de Funcionar?</h3><br>
                    <h3>¿Necesita un Mantenimiento eléctrico?</h3><br>
                    <h3>¡CONTÁCTENOS!</h3><br>
                    <a href="https://wa.me/1234567890" target="_blank">
                        <button class="wasa">
                            <i class="fa fa-whatsapp"></i>
                        </button>
                    </a>
                </section>
                <?php
                include '../Forms/conexionMySql.php';
                $sqlSop = "SELECT * FROM soporte";
                $resultPago = $conn->query($sqlSop);

                if ($resultPago->num_rows > 0) {
                    while ($row = $resultPago->fetch_assoc()) {
                        echo "<section class='soporte'>";
                        echo "<center><img src='../Images/SOPORTE.png' alt='logo' width='80px' height='80px'></center>";



                        echo "<h2>" . $row['nombreS'] . "</h2><br>";

                        echo "<h3>Telefono: " . $row['telefonoS'] . "</h3><br>";

                        echo "<h3>Correo: " . $row['correoS'] . "</h3><br>";

                        echo "<h3>Encargado: " . $row['contactoS'] . "</h3><br>";

                        echo "<h3>Descripción: " . $row['descripcionS'] . "</h3><br>";

                        echo "<button onclick=mostrarModalEliminar(this.id) id='" . $row['idSoporte'] . "'><i class='fa fa-trash' style='font-size: 24px;'></i></button>"; // Enlace para eliminar
                        echo "</section>";
                    }
                } else {
                    echo "<p>No se encontraron resultados</p><br>";
                }
                ?>

                <script src='../Script/botonSupport.js'></script>
            </section>
            <br><br>
        </section>
        <br><br>
        <footer>
            <section class="copyR">
                <p>Copyright©2023 Urbanization Treasury </p>
            </section>
        </footer>
    </section>
</body>

</html>