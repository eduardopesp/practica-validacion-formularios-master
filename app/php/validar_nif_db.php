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

if (isset($_REQUEST['nif'])) {
    $nif = $_REQUEST['nif'];
    $sql = $db->prepare("SELECT * FROM usuarios WHERE dni=?");
    $sql->bindParam(1, $nif, PDO::PARAM_STR);
    $sql->execute();
    $valid = 'true';
    if ($sql->rowCount() > 0) {
        $valid= 'false';
    } else {
       $valid='true';
    }
}
$sql=null;
$db = null;
echo $valid;
?>
