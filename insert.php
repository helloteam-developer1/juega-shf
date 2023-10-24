<?php 
header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

// Establecer la conexión con la base de datos PostgreSQL
$host = "dpg-ckrgqgg1hnes73f8e950-a"; // Cambia esto por la dirección del host de tu base de datos PostgreSQL
$port = "5432"; // Cambia esto por el puerto de tu base de datos PostgreSQL (por defecto suele ser 5432)
$dbname = "juegashf"; // Cambia esto por el nombre de tu base de datos PostgreSQL
$user = "root"; // Cambia esto por tu nombre de usuario de PostgreSQL
$password = "Nm574iI3KrUlCreO6l2QfjAFmn7GIjGV"; // Cambia esto por tu contraseña de PostgreSQL

$conectar = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if(!$conectar){
    echo "No hay conexión";
} else {
    $sql = 'SELECT * FROM usuarios ORDER BY score DESC LIMIT 10';
    $result = pg_query($conectar, $sql);

    if(!$result){
        echo "Error en la consulta";
    } else {
        // Crear un array para almacenar los resultados
        $usuarios = array();

        // Iterar a través de los resultados y agregarlos al array
        while($row = pg_fetch_assoc($result)){
            $usuarios[] = number_format($row['score']);
        }

        // Convertir el array a formato JSON y enviarlo como respuesta
        echo json_encode($usuarios);
    }

    // Cerrar la conexión
    pg_close($conectar);
}
?>
