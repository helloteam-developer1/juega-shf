<?php 
header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
$conectar = mysqli_connect('mysql-prueba-shf.alwaysdata.net','332988','HelloMexico@123');
if(!$conectar){
    echo "No hay conexion";
}else{
    echo "Conexión a la base de datos exitosa!\n";
    $base=mysqli_select_db($conectar,'prueba-shf_juego');
    if(!$base){
        echo "no se encontro la base de datos";
    }
    echo "Base de datos existente\n";
}

$json = file_get_contents('php://input');

echo "Se recibio el texto: ".$json."<br>";
$match = array();
$match1 = array();
preg_match('/^[A-Za-z]+[ ]/', $json, $match);
preg_match('/[\s]+[0-9]/', $json, $match1);
$email=trim($match1[0]);
echo '<br>El nombre es: '.$match[0];
echo '<br>El puntaje es: '.$email;
?>