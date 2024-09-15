<?php
$nombreServidor = "localhost";
$username = "root";
$contrasena = "root";
$db = "login";


$conection = new mysqli( $nombreServidor,$username, $contrasena, $db);


if($conexion->connect_error){
    die("conexion fallida:" . $conexion->connect_errno);

} else{
    echo "conectado  jevi";

}

// obtener los datos del folmulario
$nombre =$_POST['usarlo'];
$pas = $_POST['password'];

// vamos a hacer la consulta en la base de datos
$sql = "select * from login where nombre = ? and passwork = ?;"
$stmt = $conexionDB ->prepare($sql);
$stmt = ->bind_param("s",nombre);
$stmt = ->executive();
$resultado = $stmt->get_result();

echo ($resultado);

// verificar si el usuario existe 
if($resultado->num_rows  0  ){
  $row = $resultado->fetch_assoc();

if (password_verify($pas,$row['password'])  ){
echo 'login exitoso'

}else{
    echo "la es incorrecta";
    
}

}else {
    echo 'usuario no conctado no existe';

}

//cerrar conexion

$stmt->close();
$conexionDB->close();

?>




