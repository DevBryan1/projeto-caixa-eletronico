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
    <hr>
    <h3>Movimentação/Extrato</h3>

    <a href="add-transacao.php">Adicionar Transação +</a><br/><br/>

    <table border="1" width="500px">
        <tr>
            <th>Data</th>
            <th>Valor</th>
        </tr>

    <?php
        $sql = $pdo->prepare("SELECT * FROM historico WHERE id_conta = :id_conta");
        $sql->bindValue("id_conta", $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() as $item){
                ?>
                <tr>
                    <td><?php echo date('d/m/Y H:i', strtotime($item['data_operacao'])); ?></td>
                    <td>
                        <?php if($item['tipo'] == 0):  ?>
                        <span style="color:green;" >R$ <?php echo $item['valor']; ?></td></span>
                        <?php else: ?>
                        <span style="color:red;">- R$ <?php echo $item['valor']; ?></td></span>
                        <?php endif;?>
                    
                </tr>
                <?php
            }
        }
    ?>
    </table>

</body>
</html>