<?php 
header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
$conectar = mysqli_connect('mysql-prueba-shf.alwaysdata.net','332988','HelloMexico@123');
if(!$conectar){
    echo "No hay conexion";
}else{
    
    $base=mysqli_select_db($conectar,'prueba-shf_juego');
    if(!$base){
        echo "no se encontro la base de datos";
    }
}
$sql= 'select * from usuarios order by score desc limit 10';
$result= mysqli_query($conectar,$sql);
foreach($result as $r){
    echo number_format($r['score'])."\n";
    
}

?>