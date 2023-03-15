<?php
require_once('config.inc.php');
$conexao = new PDO(MYSQL_DSN ,MYSQL_USUARIO, MYSQL_SENHA);
if (!$conexao){
    echo 'Erro ao conectar';
    die();   // interrompe a execução do script caso ocorra erro
}else{
    $consulta = 'SELECT * FROM cidade';
    $query = $conexao->prepare($consulta);
    $query->execute();
    $cidades = $query->fetchAll();
}



?>