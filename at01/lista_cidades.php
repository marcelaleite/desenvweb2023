<?php
require_once('config.inc.php');
$conexao = new PDO(MYSQL_DSN ,MYSQL_USUARIO, MYSQL_SENHA);
if (!$conexao){
    echo 'Erro ao conectar';
    die();   // interrompe a execução do script caso ocorra erro
}else{
    $consulta = 'SELECT * FROM cidade';
    $cidade = ($_GET['cidade']?'%'.$_GET['cidade'].'%':'');
    if ($cidade != ''){
        $consulta .= " WHERE nome LIKE :cidade";
    }
    $query = $conexao->prepare($consulta);
    if ($cidade != '')
        $query->bindValue(':cidade',$cidade);
    $query->execute();
    $cidades = $query->fetchAll();
    echo json_encode($cidades);
}



?>