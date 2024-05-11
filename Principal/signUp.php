<?php
session_start();
$revisar = false;
$enviado = false;
$botonCreado = true;
$ingresado = false;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing Up System Urbanization</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat+Alternates:wght@400;900&family=Montserrat:wght@600&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="../Styles/styleSignUp.css">
    <script>
        function validarNumeros(e) {
            var entrada = e.key;
            if (!/^\d+$/.test(entrada)) {
                e.preventDefault();
            }
        }
    </script>
</head>

<body>
    <section class="wrapper">
        <section class="formulario-container">
            <form class="formulario" method="post">
                <br>
                <h1 class="title">Regístrese</h1>
                <section class="inp">
                    <input type="text" name="cedula" class="input" placeholder="Ingrese su Cédula" onkeypress="validarNumeros(event)" value="<?php echo isset($_POST['cedula']) ? htmlspecialchars($_POST['cedula']) : ''; ?>" maxlength="10">
                    <i class="fas fa-id-card"></i>
                    <input type="hidden" name="presionaValidacion" value="1">
                </section>
                <button type="submit" name="validarResidente" class="submit">Validar Residente</button>
            </form>
            <?php
            include '../Forms/validarCedula.php';
            include_once '../Forms/conexionMySql.php';

            if (isset($_POST['validarResidente'])) {
                $cedula = $_POST["cedula"];

                if (validarCedulaEcuatoriana($cedula)) {
                    $presionaValidacion = $_POST["presionaValidacion"];

                    // Cambia la consulta para buscar en la base de datos
                    $sql = "SELECT * FROM residente WHERE cedulaR = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $cedula);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows === 0) {
                        echo "<p style='color:red;' class='footer'>Residente no encontrado</p>";
                        $encontrado = false;
                    } else {
                        echo "<p style='color:green;' class='footer'>Residente encontrado</p>";
                        $_SESSION["cedula"] = $cedula;
                        $encontrado = true;
                    }
                    $presionaValidacion = true;
                    $stmt->close();
                } else {
                    echo "<p style='color:red;' class='footer'>Cédula no válida</p>";
                    $presionaValidacion = false;
                }
                $_SESSION["cedula"] = $cedula;
            }

            ?>
            <form class="formulario" method="post">
                <section class="inp">
                    <input type="text" name="usuario" class="input" placeholder="Nuevo Usuario" required>
                    <i class="fas fa-user"></i>
                </section>
                <section class="inp">
                    <input type="password" name="contrasenia" class="input" placeholder="Nueva Contraseña" required>
                    <i class="fas fa-lock"></i>
                </section>
                <section class="inp">
                    <input type="password" name="passwordValidar" class="input" placeholder="Confirmar Contraseña" required>
                    <i class="fas fa-lock"></i>
                </section>
                <?php
                include '../Forms/IngresoUsuarios.php';

                if (isset($_POST['validarResidente'])) {
                    if ($presionaValidacion and $encontrado) {
                        echo "<button type='submit' name='registrarBoton' class='submit'> Registrar </button><br>";
                        $botonCreado = true;
                    }
                }
                if ($botonCreado) {
                    if (isset($_POST['registrarBoton'])) {
                        $usuario = $_POST["usuario"];
                        $contrasenia = $_POST["contrasenia"];
                        $passwordValidar = $_POST["passwordValidar"];
                        $cedula = $_SESSION["cedula"];

                        $mensaje = ingresoUsuarios($usuario, $contrasenia, $passwordValidar, $cedula);

                        if ($mensaje == "¡Usuario creado con éxito!") {
                            echo "<br><p style='color:green;'>" . $mensaje . "</p>";
                        } else if ($mensaje == "Usuario ya existente!") {
                            echo "<br><p style='color:red;'>" . $mensaje . "</p>";
                        } else if ($mensaje == "Las contraseñas no coinciden") {
                            echo "<br><p style='color:red;'>" . $mensaje . "</p>";
                        }
                    }
                }
                ?>
                <p class="footer">¿Ya tienes cuenta?<a href="../index.html" class="link"> Iniciar Sesion </a>
                </p>
            </form>
            <?php
            if ($enviado) {
                if ($ingresado) {
                    echo "<br><p style='color:green;'>" . $mensaje . "</p>";
                } else {
                    echo "<br><p style='color:red;'>" . $mensaje . "</p>";
                }
                $_SESSION['enviado'] = false;
            } ?>
        </section>
        <section></section>
        <section class="banner">
            <img src="../Images/LOGOPEPN.png" alt="Logo Urbanización" width="45%"><br>
            <h1 class="welText">"Un Lugar para<br>llamar Hogar"<br></h1>
        </section>
    </section>

</body>

</html>