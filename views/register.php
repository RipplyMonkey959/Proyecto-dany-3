<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){ // Verifica si la solicitud es de tipo POST
    $id = $_POST["id"]; // Obtiene el valor del campo "id" del formulario
    $usrName = $_POST["usrName"]; // Obtiene el valor del campo "usrName" del formulario
    $usrPw = $_POST["usrPw"]; // Obtiene el valor del campo "usrPw" del formulario
    $usrFechaAlta = $_POST["usrFechaAlta"]; // Obtiene el valor del campo "usrFechaAlta" del formulario
    $usrSex = $_POST["usrSex"]; // Obtiene el valor del campo "usrSex" del formulario

    $servername = "localhost"; // Establece el nombre del servidor de la base de datos
    $dbusername = "root"; // Establece el nombre de usuario de la base de datos
    $dbpassword = ""; // Establece la contraseña de la base de datos
    $dbname = "usuario"; // Establece el nombre de la base de datos

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname); // Establece una nueva conexión mysqli con la base de datos
    if ($conn->connect_error){ // Verifica si hay un error de conexión
        die("Error connecting: " . $conn->connect_error); // Si hay un error, muestra un mensaje de error y termina la ejecución del script
    }
    $stmt = $conn->prepare("INSERT INTO usuarios (id, usrName, usrPw, usrFechaAlta, usrSex) VALUES (?, ?, ?, ?, ?)"); // Prepara una sentencia SQL para inserción
    if ($stmt === false){ // Verifica si hubo un error al preparar la sentencia SQL
        die("Error preparing statement: " . $conn->error); // Si hubo un error, muestra un mensaje de error y termina la ejecución del script
    }
    $stmt->bind_param("sssss", $id, $usrName, $usrPw, $usrFechaAlta, $usrSex); // Vincula los parámetros a la sentencia SQL preparada

    if ($stmt->execute()) { // Ejecuta la sentencia SQL preparada
        echo "Usuario registrado con éxito"; // Si la ejecución es exitosa, muestra un mensaje de éxito
    }else{
        echo "Error executing statement: " . $stmt->error; // Si hay un error en la ejecución, muestra un mensaje de error
    }
    $stmt->close(); // Cierra la sentencia SQL preparada
    $conn->close(); // Cierra la conexión a la base de datos
}
?>
