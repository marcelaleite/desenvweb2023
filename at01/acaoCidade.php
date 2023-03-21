<?php
// depurar variáveis HTML
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
 
// adicionar arquivos de configuração
require_once('config.inc.php');

// abrir conexão com o banco
$conexao = new PDO(MYSQL_DSN ,MYSQL_USUARIO, MYSQL_SENHA);

//testa se a conexão deu certo
if (!$conexao){
    echo 'Erro ao conectar';
    die();   // interrompe a execução do script caso ocorra erro
}else{
    // montar a consulta - aqui é somente o comando como string que será executado - as variáveis indicadas com : no inicio do nome devem ser substituídas pelos valores enviados pelo formulário 
    $consulta = 'INSERT INTO cidade (nome, estado) 
                      VALUES(:nome,:estado )';
    
    // agora prepara o comando para execução - aqui o comando cria um 'objeto' que terá as informações do comando que será executado no BD
    $query = $conexao->prepare($consulta);
    
    // agora é necessário enviar os valores que serão salvos no banco, vinculando com os parâmetros da consulta
    $query->bindValue(':nome', $_POST['nome']);
    $query->bindValue(':estado', $_POST['estado']);
    
    // executar a consulta e validar se a execução deu certo
    if ($query->execute())
        echo 'Registro inserido com sucesso! Cadastro nº '.
                      $conexao->lastInsertId();
    else{
        echo 'Erro ao salvar dados. Erro: ';
        var_dump($query->errorInfo());
    }

}


?>