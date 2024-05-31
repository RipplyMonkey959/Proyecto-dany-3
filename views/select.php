<?php
 //$servername = "localhost"; // Esta línea está comentada y no tiene efecto en el código.
 $dbusername = "root"; // Variable que almacena el nombre de usuario de la base de datos.
 $dbpassword = ""; // Variable que almacena la contraseña de la base de datos.
 $dbname = "usuario"; // Variable que almacena el nombre de la base de datos.

 $conn = new mysqli("localhost", $dbusername, $dbpassword, $dbname); // Establece una nueva conexión mysqli con el servidor de base de datos.
 if ($conn->connect_error){ // Verifica si hay un error de conexión.
     die("Error de conexión: " . $conn->connect_error); // Si hay un error, muestra un mensaje de error y termina la ejecución del script.
 }

//$sql = "SELECT id, usrName, usrPw, usrFechaAlta, usrSex FROM usuarios" // Esta línea está comentada y no tiene efecto en el código.
$result = $conn->query("SELECT id, usrName, usrPw, usrFechaAlta, usrSex FROM usuarios"); 
// Ejecuta una consulta SQL y almacena el resultado en la variable $result.

 if($result->num_rows > 0){ // Verifica si hay filas en el resultado de la consulta.
    echo "<table>"; // Imprime el comienzo de una tabla HTML.
    echo "<tr><th>ID</th><th>Nombre</th><th>Contraseña</th><th>Sexo</th></tr>"; // Imprime una fila de encabezado de tabla.
    while ($row = $result->fetch_assoc()){ // Itera sobre cada fila del resultado de la consulta.
        echo "<tr><td>".$row['id']."</td><td>".$row['usrName'] ."</td><td>".$row['usrPw']."</td><td>".$row['usrSex'] ."</td></tr>"; 
        // Imprime cada fila de datos de la tabla.
    }
    echo "</table>"; // Imprime el final de la tabla HTML.
 }else{
    echo "No se encontraron registros"; // Si no hay filas en el resultado, muestra un mensaje indicando que no se encontraron registros.
 }

 $conn->close(); // Cierra la conexión a la base de datos.
 ?>
