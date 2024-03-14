<?php
session_start();

// Verificar si el usuario no ha completado los formularios anteriores
if (!isset($_SESSION["progreso"]) || $_SESSION["progreso"] < 5) {
    $error = "Debes completar el quinto formulario antes de acceder a este.";
}

// Verificar si se ha enviado el formulario y el progreso es correcto
if ($_SERVER["REQUEST_METHOD"] == "POST" && (!isset($error))) {
    // Verificar si la respuesta es correcta
    if (isset($_POST["respuesta"]) && strtolower($_POST["respuesta"]) == "2010") {
        // Incrementar el progreso y redirigir a la página final
        $_SESSION["progreso"] = 7; // Suponiendo que el progreso se establezca en 7 para indicar que se completaron todos los formularios
        header("Location: pantalla_final.php");
        exit;
    } else {
        // Si la respuesta es incorrecta, mostrar una pista
        $mensaje = "Respuesta incorrecta. Año en que Iniesta se convirtió en leyenda.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reto 6</title>
    <link rel="stylesheet" href="estilo_juego6.css">
</head>
<body>
    <h1>Reto 6</h1>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form action="" method="post">
        <label for="respuesta">En tierras sudafricanas, un evento ,
reunió a naciones de todo lugar en un año especial, que año es?.</label>
        <input type="text" id="respuesta" name="respuesta" required>
        <button type="submit">Enviar</button>
    </form>
    <?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>
</body>
</html>
