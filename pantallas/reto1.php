<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["respuesta"]) && $_POST["respuesta"] == "sol") {
        $_SESSION["progreso"] = 2;
        header("Location: reto2.php");
        exit;
    } else {
        $mensaje = "Respuesta incorrecta. Piensa en algo que alumbra durante el día.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivinanza 1</title>
    <link rel="stylesheet" href="estilo_juego1.css">

</head>
<body>
    <h1>Reto 1</h1>
    <form action="" method="post">
        <label for="respuesta">Calienta sin ser una estufa, que puede ser?</label>
        <input type="text" id="respuesta" name="respuesta" required>
        <button type="submit">Enviar</button>
    </form>
    <?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>
</body>
</html>

