<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Residents</title>
    <link rel="stylesheet" href="../Styles/styleResidente.css">
</head>

<body>
    <header class="header">
        <section>
            <img src="../Images/LOGOCOPY.png" alt="logo" width="70px">
            <h1>
                <?php
                if (isset($_GET['user'])) {
                    $usuario = $_GET['user'];
                    echo "Bienvenido $usuario";
                }
                ?>
            </h1>

        </section>
        <nav class="nav">
            <ul class="mainMenu" id="mainMenu">
                <li class="mainMenuItem"><a href="#inicio"" class=" mainMenuLink">Inicio</a></li>
                <li class="mainMenuItem"><a href="#historial" class="mainMenuLink">Historial</a></li>
                <li class="mainMenuItem"><a href="#comunicado" class="mainMenuLink">Comunicado</a></li>
                <li class="mainMenuItem"><a href="#contacto" class="mainMenuLink">Contacto</a></li>
                <li class="mainMenuItem"><a href="../index.html" class="mainMenuLink">Salir</a></li>
            </ul>
            <div class="responsiveMenu" id="responsiveMenu">
                <svg class="svg" id="svg" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </div>
        </nav>
    </header>

    <body>
        <section class="contenidoPrincipal">
            <scroll-container>
                <scroll-page id="inicio">
                    <section>
                        <section id="mainContent">
                            <section class="indicacionesIniciales">
                                <section class="slider-box">
                                    <center>
                                        <ul>
                                            <li><img src="../Images/ImagenFachada1.jpg" alt=""></li>
                                            <li><img src="../Images/ImagenCasa1.jpg" alt=""></li>
                                            <li><img src="../Images/ImagenCasa2.jpg" alt=""></li>
                                        </ul>
                                    </center>
                                </section id="bienvenida">

                                <?php
                                if (isset($_GET['user'])) {
                                    $usuario = $_GET['user'];
                                    echo "<h3>Hola $usuario, Bienvenido a tu perfil</h3>";
                                }
                                ?>
                                <ul>
                                    <li>Si no puedes acceder al apartado de historial, verifica que no tengas deudas pendientes.</li>
                                    <li>Para verificar si tienes deudas pendientes, puedes hacerlo mediante el envío de un correo a: micorreo@hotmail.com</li>
                                    <li>Si tienes deudas o posees un problema con tu perfil, por favor usa el apartado de contacto para poder comunicarte con la administración de la Urbanización.</li>
                                    <li>Recuerda que, una vez que hayas cancelado tus valores pendientes podrás visualizar tu historial de pagos automáticamente.</li>
                                </ul>

                            </section>
                            <section class="content">
                                <div class="container">
                                    <article class="card">
                                        <div class="imgBx">
                                            <center>
                                                <img src="../Images/Inicio.png" alt="">
                                            </center>
                                        </div>
                                        <div class="contenido">
                                            <p>
                                                Encontrarás información e indicaciones generales para el uso del sistema.
                                            </p>
                                        </div>
                                    </article>
                                    <article class="card">
                                        <div class="imgBx">
                                            <center>
                                                <img src="../Images/historial.png" alt="">
                                            </center>
                                        </div>
                                        <div class="contenido">
                                            <p> Encontrarás tus pagos realizados en el último mes o Estados Pendientes.
                                            </p>
                                        </div>
                                    </article>
                                    <article class="card">
                                        <div class="imgBx">
                                            <center>
                                                <img src="../Images/Comunicado.png" alt="">
                                            </center>
                                        </div>
                                        <div class="contenido">
                                            <p>
                                                Encontrarás los comunicados generales de la Urbanización, estar al pendiente.
                                            </p>
                                        </div>
                                    </article>
                                    <article class="card">
                                        <div class="imgBx">
                                            <center>
                                                <img src="../Images/Contacto.png" alt="">
                                            </center>
                                        </div>
                                        <div class="contenido">
                                            <p>
                                                Si tienes alguna duda o problema, puedes contactarte con la administración.
                                            </p>
                                        </div>
                                    </article>
                                </div>
                            </section>
                        </section>
                    </section>
                </scroll-page>
                <scroll-page id="historial">
                    <section>
                        <h2>Historial de pagos:</h2><br>
                        <table>
                            <tr class="header-row">
                                <td>
                                    <strong>
                                        <p>ID</p>
                                    </strong>
                                </td>
                                <td>
                                    <strong>
                                        <p>Nombre</p>
                                    </strong>
                                </td>
                                <td>
                                    <strong>
                                        <p>Fecha</p>
                                    </strong>
                                </td>
                                <td>
                                    <strong>
                                        <p>Monto</p>
                                    </strong>
                                </td>
                                <td>
                                    <strong>
                                        <p>Tipo</p>
                                    </strong>
                                </td>
                                <td>
                                    <strong>
                                        <p>Observaciones</p>
                                    </strong>
                                </td>
                            </tr>
                            <?php
                            include '../Forms/conexionMySql.php';

                            if (isset($_GET['user'])) {
                                $user = $_GET['user'];

                                $sqlCedula = "SELECT cedulaResidenteU FROM usuario WHERE usuarioU = '$user'";
                                $resultado = $conn->query($sqlCedula);

                                if ($resultado->num_rows > 0) {
                                    $fila = $resultado->fetch_assoc();
                                    $id = $fila['cedulaResidenteU'];
                                }
                            }


                            $sqlPago = "SELECT pago.*, residente.nombreR 
                            FROM pago 
                            INNER JOIN residente 
                            ON pago.residenteP = residente.cedulaR 
                            WHERE pago.residenteP = $id 
                            ORDER BY pago.fechaP DESC";

                            $resultPago = $conn->query($sqlPago);
                            $index = 0;

                            if ($resultPago->num_rows > 0) {
                                while ($row = $resultPago->fetch_assoc()) {
                                    if ($index < 10) {
                                        $rowClass = ($index % 2 == 0) ? 'even-row' : 'odd-row';
                                        echo "<tr class='$rowClass'>";
                                        echo "<td>" . $row["residenteP"] . "</td>";
                                        echo "<td>" . $row["nombreR"] . "</td>";
                                        echo "<td>" . $row["fechaP"] . "</td>";
                                        echo "<td>" . $row["montoP"] . "</td>";
                                        echo "<td>" . $row["tipoP"] . "</td>";
                                        echo "<td>" . $row["observacionesP"] . "</td>";
                                        echo "</tr>";
                                        $index++;
                                    }
                                }
                            } else {
                                echo "<p>No se encontraron resultados</p><br>";
                            }
                            echo "<script>window.location = '#resumen-residente';</script>";

                            ?>
                        </table>
                    </section>
                </scroll-page>
                <scroll-page id="comunicado">
                    <section>
                        <h1>Comunicados Generales:</h1>
                        <img src="../Images/Seccion_Comunicaciones.jpeg">
                    </section>
                    <ul>
                        <li> Los pagos se receptaran hasta el dia 29 de cada mes, recuerde ser puntual para no generar ninguna clase de conflictos</li><br>
                        <li> El dia 20 / 12 / 2023, se llevara a cabo el programa de Navidad, donde se entregara una funda de caramelos en la siguiente direccion: ...</li><br>
                        <li> El guardia de seguridad trabajara el dia de Navidad y el dia de Anio nuevo, por ello deberan comentar a sus familiares u amigos que deben traer la cedula para poder ingresar a la urbanizacion.</li>
                    </ul>
                </scroll-page><br>
                <scroll-page id="contacto">
                    <section class="formularioContainer">
                        <section class="formulario">
                            <center><img src="../Images/Seccion_contact.png"></center>
                        </section>
                        <section class="formulario">
                            <center>
                                <form method="post">
                                    <h3>Contacto</h3>
                                    <?php
                                    if (isset($_GET['user'])) {
                                        $usuario = $_GET['user'];
                                        echo "<input type='hidden' name='usuario' value=$usuario>";
                                    }
                                    ?>
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" placeholder="Nombre" pattern="[A-Za-z\s]+" title="Por favor, ingresa solo letras y espacios" required>
                                    <label>E-mail</label>
                                    <input type="text" name="email" placeholder="E-mail" required>
                                    <label>Asunto</label>
                                    <textarea name="asunto" placeholder="Asunto" required></textarea>
                                    <input type="submit" value="Enviar" name="enviarComentario">
                                </form>
                                <?php
                                include '../Forms/procesamientoDatos.php';
                                if (isset($_POST['enviarComentario'])) {
                                    $usuario = $_POST['usuario'];
                                    $nombre = $_POST['nombre'];
                                    $email = $_POST['email'];
                                    $asunto = $_POST['asunto'];
                                    $mensaje = ingresoComentario($usuario, $nombre, $email, $asunto);
                                    echo "<script>alert('$mensaje');</script>";
                                }
                                ?>
                            </center>
                        </section>
                    </section>


                </scroll-page>
            </scroll-container>
        </section>
    </body>
    <footer class="footer">
        <section class="copyR">
            <p>Copyright©2023 DJL.</p>
        </section>
    </footer>
    <script src="../Script/residente.js"></script>
</body>

</html>