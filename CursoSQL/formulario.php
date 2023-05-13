<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
	    <title>Formulario de registro </title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="group">
	        <form action="" method="post" >
                <h2>Formulario de registro</h2>
		        <label for="nombre">Nombre: <span><em>(requerido)</em></span></label>
		        <input type="text" class="form-input" name="nombre" id="nombre" required><br>

                <label for="apellido">Apellido: <span><em>(requerido)</em></span></label>
		        <input type="text" class="form-input" name="apellido" id="apellido" required><br>

		        <label for="email">E-mail: <span><em>(requerido)</em></span></label>
		        <input type="email" class="form-input" name="email" id="email" required><br>
		        <br>
		        <input type="submit" name="submit" class="form-btn" value="Suscribirse">

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "cursosql";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuario (nombre, apellido, email)
            VALUES ('$nombre', '$apellido', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro creado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>
            </form>
        </div>
    </body>
</html>