<?php
session_start();

// Verificar si el usuario no ha completado los formularios anteriores
if (!isset($_SESSION["progreso"]) || $_SESSION["progreso"] < 2) {
    $error = "Debes completar el segundo formulario antes de acceder a este.";
}

// Verificar si se ha enviado el formulario y el progreso es correcto
if ($_SERVER["REQUEST_METHOD"] == "POST" && (!isset($error))) {
    // Verificar si la respuesta es correcta
    if (isset($_POST["respuesta"]) && strtolower($_POST["respuesta"]) == "numero pi") {
        // Incrementar el progreso y redirigir al siguiente formulario
        $_SESSION["progreso"] = 4;
        header("Location: reto4.php");
        exit;
    } else {
        // Si la respuesta es incorrecta, mostrar una pista
        $mensaje = "Respuesta incorrecta. En un círculo escondido, un número sin fin está escondido. ¿Cuál es ese número tan querido?.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reto 3</title>
    <link rel="stylesheet" href="estilo_juego3.css">
</head>
<body>
    <h1>Reto 3</h1>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form action="" method="post">
        <label for="respuesta">Es Infinito en cifras y sin final, y algo
irracional </label>
        <input type="text" id="respuesta" name="respuesta" required>
        <button type="submit">Enviar</button>
    </form>
    <?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>
</body>
</html>
