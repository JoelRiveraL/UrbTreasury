<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Styles/styleComentarios.css">
</head>

<body>
    <header>
        <section>
            <img src="../Images/LOGOCOPY.png" alt="" width="55px">
            <a href="#" class="logo">Comentarios</a>
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
        <br><br><br><br><br>
        <section>
            <br>
            <h2 class="comentarios">Comentario mas reciente:</h2><br>
            <?php
            include '../Forms/conexionMySql.php';

            $sql = "SELECT * FROM comentarios ORDER BY fechaC DESC LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<section class='resumen'><br>";
                    echo "<h2>" . $row["nombreResC"] . "</h2><br>";
                    echo "<p>" . $row["emailResC"] . "</p><br>";
                    echo "<p>" . $row["asuntoC"] . "</p><br>";
                    echo "</section><br>";
                }
            } else {
                echo "<section class='resumen'><br>";
                echo "<p>No se ha registrado ningun comentario reciente</p><br>";
                echo "</section><br>";
            }
            ?>
        </section>
        <section>
            <br>
            <h2 class="comentarios">Comentarios:</h2><br>
            <?php
            include '../Forms/conexionMySql.php';

            $sql = "SELECT * FROM comentarios ORDER BY fechaC DESC LIMIT 7";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<section class='resumen'><br>";
                    echo "<h2>" . $row["nombreResC"] . "</h2><br>";
                    echo "<p>" . $row["emailResC"] . "</p><br>";
                    echo "<p>" . $row["asuntoC"] . "</p><br>";
                    echo "</section><br>";
                }
            }
            ?>
        </section>
        <footer>
            <section class="copyR">
                <p>Copyright © 2024 Urbanization Treasury </p>
            </section>
        </footer>
    </section>
</body>

</html>