<?php
session_start();
require 'config.php';
if(isset($_SESSION['banco']) && !empty($_SESSION['banco'])){
    $id = $_SESSION['banco'];

    $sql = $pdo->prepare("SELECT * FROM contas WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $info = $sql->fetch();
    }else {
        header('Location: login.php');
        exit;
    }

} else {
    header('Location: login.php');
    exit;
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
    Titular:<?php echo $info['titular'];?> <br/>
    Agência: <?php echo $info['agencia'];?><br>
    Conta: <?php echo $info['conta'];?><br>
    Saldo: <?php echo $info['saldo'];?><br/>
    <a href="sair.php">Sair</a>
</body>
</html>