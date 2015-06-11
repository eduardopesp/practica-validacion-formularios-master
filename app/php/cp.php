<?php
header('Access-Control-Allow-Origin: *');

$dbinfo = "mysql:dbname=eduardoperez_a;host=localhost";
$user = "eduardoperez_edu";
$pass = "123456";

try {
    $db = new PDO($dbinfo, $user, $pass);
    $db->exec('SET CHARACTER SET utf8');
} catch (Exception $e) {
    echo "La conexi&oacute;n ha fallado: " . $e->getMessage();
}

$_REQUEST['zip'] = "12";
$prueba=$_POST['zip'];
echo"$prueba";
if (isset($_POST['zip'])) {   
    $sql = $db->prepare("SELECT poblacion,cod_postal FROM t_municipios WHERE cod_postal=?");
    $sql->bindParam(1,$prueba);
    $sql->execute();

    $valid = 'true'; 
    if ($sql->rowCount() > 0) {
        $valid= 'false';
    } else {
       $valid='true';
    }
 
    while ($row=$sql->fetch()) {   
    $opciones.= "<option ='{$row['cod_postal']}'>{$row['poblacion']}</option>";
      }
     
    echo $opciones;    
}
$sql=null;
$db = null;
echo $okey[0];
?>