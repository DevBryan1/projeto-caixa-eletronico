<?php
session_start();
if(isset($_SESSION['banco']) && !empty($_SESSION['banco'])){

} else {
    header('Location: login.php');
}


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônico</title>
</head>
<body>
    <h1>Banco Mello's</h1>
    Agência: 0000<br>
    Conta: 0000<br>
    <a href="sair.php">Sair</a>
</body>
</html>