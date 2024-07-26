<?php


// Recibe el nombre enviado desde JavaScript
$nombre = $_GET['Usuario'];

// Realiza la consulta en tu base de datos (aquí debes adaptarlo según tu entorno)
// En este ejemplo, supondré que tienes una conexión a la base de datos y haces una consulta SQL

// Establece la conexión a la base de datos
$con = mysqli_connect("localhost", "root", "root", "Siace_Final");

// Verifica la conexión
if (!$con) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
// Utiliza consultas preparadas para evitar inyecciones SQL
$query = "SELECT COUNT(*) as count FROM usuarios WHERE usuario = ?";
$statement = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($statement, "s", $nombre);
mysqli_stmt_execute($statement);
mysqli_stmt_bind_result($statement, $count);
mysqli_stmt_fetch($statement);

// Verifica si el nombre existe
$existe = ($count > 0);

if($existe){
    $existe = true;
}else{
    $existe = false;
}

// Devuelve la respuesta en formato JSON
echo json_encode(['existe' => $existe]);

// Cierra la conexión a la base de datos
mysqli_stmt_close($statement);
mysqli_close($con);
?>
