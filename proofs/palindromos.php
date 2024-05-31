<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Establece la codificación de caracteres del documento como UTF-8 -->
    <meta charset="UTF-8">
    <!-- Establece la escala inicial para la visualización en dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Establece el título de la página -->
    <title>Palíndromo Extremo</title>
</head>
<body>
    <!-- Formulario para enviar una palabra -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <!-- Etiqueta y campo de entrada para ingresar la palabra -->
        <label for="palabra">Ingresa una palabra:</label>
        <input type="text" id="palabra" name="palabra" required>
        <!-- Botón para enviar el formulario -->
        <button type="submit">Verificar Palíndromo</button>
    </form>
</body>
</html>


<?php //abre script PHP
// Comprueba si la solicitud HTTP es un método POST
$nuevo="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el valor del parámetro 'palabra' enviado mediante el método POST
    $palabra = $_POST["palabra"];
    // Elimina los espacios en blanco al principio y al final de la palabra, y convierte a minúsculas
    $palabra = strtolower(trim($palabra));
    $nuevo .= $palabra;
    // Verifica si la palabra es un palíndromo comparándola con su inverso
    $esPalindromo = ($palabra == strrev($palabra));

    // Muestra el resultado en función de si la palabra es un palíndromo o no
    if ($esPalindromo) {
        // Si es un palíndromo, muestra un mensaje indicando que la palabra es un palíndromo
        echo "¡La palabra '$palabra' es un palíndromo, mi pana rabbit";
    } else {
        // Si no es un palíndromo, muestra un mensaje indicando que la palabra no es un palíndromo
        echo "La palabra '$palabra' no es un palíndromo, mi tlacoyo con queso";
    }
}

?> <!--cierra script PHP -->

