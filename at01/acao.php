<?php
// depurar variáveis HTML
echo '<pre>';
var_dump($_POST);
echo '</pre>';
 

require_once('config.inc.php');
// abrir conexão com o banco
$conexao = new PDO(MYSQL_DSN ,MYSQL_USUARIO, MYSQL_SENHA);
if (!$conexao){
    echo 'Erro ao conectar';
    die();
}else{
    // montar a consulta
    $consulta = 'INSERT INTO contatos (nome, sobrenome, email, dtnasci, telefone, cidade, obs, vivo ) 
                VALUES(:nome,:sobrenome, :email, :dtnasci,:telefone, :cidade, :obs, :vivo )';
    $query = $conexao->prepare($consulta);
    $query->bindValue(':nome', $_POST['nome']);
    $query->bindValue(':sobrenome', $_POST['sobrenome']);
    $query->bindValue(':email', $_POST['email']);
    $query->bindValue(':telefone', $_POST['telefone']);
    $query->bindValue(':dtnasci', $_POST['dtnasci']);
    $query->bindValue(':cidade', $_POST['cidade']);
    $query->bindValue(':obs', $_POST['obs']);
    $query->bindValue(':vivo', ($_POST['vivo']=='on'?1:0));
    // executar a consulta e validar se a execução deu certo
    if ($query->execute())
        echo 'Registro inserido com sucesso! Cadastro nº '.
                      $conexao->lastInsertId();
    else
        echo 'Erro ao salvar dados.';

}


?>