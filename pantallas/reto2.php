<?php
session_start();

// Verificar si el usuario no ha completado los formularios anteriores
if (!isset($_SESSION["progreso"]) || $_SESSION["progreso"] < 1) {
    $error = "Debes completar el primer formulario antes de acceder a este.";
}

// Verificar si se ha enviado el formulario y el progreso es correcto
if ($_SERVER["REQUEST_METHOD"] == "POST" && (!isset($error))) {
    // Verificar si la respuesta es correcta
    if (isset($_POST["respuesta"]) && strtolower($_POST["respuesta"]) == "pokemon") {
        // Incrementar el progreso y redirigir al siguiente formulario
        $_SESSION["progreso"] = 3;
        header("Location: reto3.php");
        exit;
    } else {
        // Si la respuesta es incorrecta, mostrar una pista
        $mensaje = "Respuesta incorrecta. Puedes atraparlos en cada estación,
        con una bola, sin más razón..";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reto 2</title>
    <link rel="stylesheet" href="estilo_juego2.css">
</head>
<body>
    <h1>Reto 2</h1>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form action="" method="post">
        <label for="respuesta">Son Criaturas mágicas,
con poderes diversos y fuerza brutal
cazadas y entrenadas con gran devoción,
luchando sin cansar, en toda región, queines son?.</label>
        <input type="text" id="respuesta" name="respuesta" required>
        <button type="submit">Enviar</button>
    </form>
    <?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>
</body>
</html>
