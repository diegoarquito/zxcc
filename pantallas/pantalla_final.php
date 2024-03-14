<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felicitaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }
        #container {
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            color: #333;
        }
        #confetti {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: -1;
        }
    </style>
</head>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felicitaciones</title>
    <link rel="stylesheet" href="pantalla_final.css">
    
</head>
<body>
<div id="container">
        <h1>Felicidades</h1>
        <p>¡Has conseguido salvar a la humanidad!</p>
        <!-- Botón para volver a la página inicial -->
        <a href="pantalla_carga.php"><button>Volver a la página inicial</button></a>
    </div>
    <canvas id="confetti"></canvas>
    <script>
        // Código para el efecto de confeti
        var canvas = document.getElementById('confetti');
        var ctx = canvas.getContext('2d');
        var W = window.innerWidth;
        var H = window.innerHeight;
        canvas.width = W;
        canvas.height = H;
        var mp = 100; // máxima cantidad de confeti
        var particles = [];
        for(var i = 0; i < mp; i++) {
            particles.push({
                x: Math.random()*W, // posición x aleatoria
                y: Math.random()*H, // posición y aleatoria
                r: Math.random()*8+1, // radio aleatorio
                d: Math.random()*mp // densidad
            });
        }
        function draw() {
            ctx.clearRect(0, 0, W, H);
            ctx.fillStyle = 'rgba(255, 255, 255, 0.8)';
            ctx.beginPath();
            for(var i = 0; i < mp; i++) {
                var p = particles[i];
                ctx.moveTo(p.x, p.y);
                ctx.arc(p.x, p.y, p.r, 0, Math.PI*2, true);
            }
            ctx.fill();
            update();
        }
        var angle = 0;
        function update() {
            angle += 0.01;
            for(var i = 0; i < mp; i++) {
                var p = particles[i];
                // Actualizar la posición y el ángulo
                p.y += Math.cos(angle+p.d) + 1 + p.r/2;
                p.x += Math.sin(angle) * 2;
                // Si la confeti sale de la pantalla, volver a colocarlo en la parte superior
                if(p.x > W+5 || p.x < -5 || p.y > H) {
                    if(i%3 > 0) {
                        particles[i] = {x: Math.random()*W, y: -10, r: p.r, d: p.d};
                    } else {
                        if(Math.sin(angle) > 0) {
                            particles[i] = {x: -5, y: Math.random()*H, r: p.r, d: p.d};
                        } else {
                            particles[i] = {x: W+5, y: Math.random()*H, r: p.r, d: p.d};
                        }
                    }
                }
            }
        }
        setInterval(draw, 33);
    </script>
</body>
</html>
