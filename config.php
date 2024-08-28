<?php
$dns = "mysql:dbname=projeto_caixa_eletronico;host=localhost;";
$dbuser = "root";
$dbpass = "";
try{
    $pdo = new PDO($dns, $dbuser, $dbpass);
} catch(PDOException $e){
    echo "FALHOU: ".$e->getMessage();
}

?>