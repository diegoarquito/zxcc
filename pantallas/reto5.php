<?php
session_start();

// Verificar si el usuario no ha completado los formularios anteriores
if (!isset($_SESSION["progreso"]) || $_SESSION["progreso"] < 4) {
    $error = "Debes completar el cuarto formulario antes de acceder a este.";
}

// Verificar si se ha enviado el formulario y el progreso es correcto
if ($_SERVER["REQUEST_METHOD"] == "POST" && (!isset($error))) {
    // Verificar si la respuesta es correcta
    if (isset($_POST["respuesta"]) && strtolower($_POST["respuesta"]) == "piedra") {
        // Incrementar el progreso y redirigir al siguiente formulario
        $_SESSION["progreso"] = 6;
        header("Location: reto6.php");
        exit;
    } else {
        // Si la respuesta es incorrecta, mostrar una pista
        $mensaje = "Respuesta incorrecta. A veces suave, a veces dura,
        mi presencia en el suelo perdura";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reto 5</title>
    <link rel="stylesheet" href="estilo_juego5.css">
</head>
<body>
    <h1>Reto 5</h1>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form action="" method="post">
        <label for="respuesta">Formada por años de presión y calor,
en ríos y montañas</label>
        <input type="text" id="respuesta" name="respuesta" required>
        <button type="submit">Enviar</button>
    </form>
    <?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>
</body>
</html>
