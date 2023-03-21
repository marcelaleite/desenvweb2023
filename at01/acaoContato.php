<?php
// depurar variáveis HTML
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
 
// adicionar arquivos de configuração
require_once('config.inc.php');

// capturar ação executada
$acao = (isset($_POST['acao'])?$_POST['acao']:'');

// na edição e exclusão será informado o ID do cadastro
$id = (isset($_POST['id'])?$_POST['id']:0);
// capturar dados enviados por formulário
$nome = (isset($_POST['nome'])?$_POST['nome']:''); 
$sobrenome = (isset($_POST['sobrenome'])?$_POST['sobrenome']:'');
$email = (isset($_POST['email'])?$_POST['email']:'');
$telefone = (isset($_POST['telefone'])?$_POST['telefone']:'');
$dtnasci = (isset($_POST['dtnasci'])?$_POST['dtnasci']:'');
$cidade = (isset($_POST['cidade'])?$_POST['cidade']:0);
$obs = (isset($_POST['obs'])?$_POST['obs']:'');
$vivo = 0;
if (isset($_POST['vivo']))
    $vivo = ($_POST['vivo']== 'on'? 1: 0);


// abrir conexão com o banco
$conexao = new PDO(MYSQL_DSN ,MYSQL_USUARIO, MYSQL_SENHA);

//testa se a conexão deu certo
if (!$conexao){
    echo 'Erro ao conectar';
    die();   // interrompe a execução do script caso ocorra erro
}else{
    // verificar tipo de solicitação salvar/alterar ou excluir registro
    if ($acao == 'salvar'){
        // montar a consulta - aqui é somente o comando como string que será executado - as variáveis indicadas com : no inicio do nome devem ser substituídas pelos valores enviados pelo formulário 
        if ($id > 0) // alterar
            $consulta = 'UPDATE contatos
                            SET nome = :nome, 
                                sobrenome = :sobrenome, 
                                email = :email, 
                                dtnasci = :dtnasci, 
                                telefone = :telefone, 
                                cidade = :cidade, 
                                obs = :obs, 
                                vivo = :vivo
                          WHERE id = :id';
        else // salvar
            $consulta = 'INSERT INTO contatos (nome, sobrenome, email, dtnasci, telefone, cidade, obs, vivo ) 
                        VALUES(:nome,:sobrenome, :email, :dtnasci,:telefone, :cidade, :obs, :vivo )';
    
        // agora prepara o comando para execução - aqui o comando cria um 'objeto' que terá as informações do comando que será executado no BD
        $query = $conexao->prepare($consulta);
        
        // agora é necessário enviar os valores que serão salvos no banco, vinculando com os parâmetros da consulta
        $query->bindValue(':nome', $nome);
        $query->bindValue(':sobrenome', $sobrenome);
        $query->bindValue(':email', $email);
        $query->bindValue(':telefone', $telefone);
        $query->bindValue(':dtnasci', $dtnasci);
        $query->bindValue(':cidade', $cidade);
        $query->bindValue(':obs', $obs);
        $query->bindValue(':vivo', $vivo);
        if ($id > 0) // alterar
            $query->bindValue(':id', $id);

        // executar a consulta e validar se a execução deu certo
        if ($query->execute())
            // echo 'Registro inserido com sucesso! Cadastro nº '.
                        //   $conexao->lastInsertId();
            header('location: listar_contatos.php?id='.$conexao->lastInsertId());
        else{
            echo 'Erro ao salvar dados. Erro: ';
            var_dump($query->errorInfo());
        }
    }elseif ($acao == 'excluir'){ // fim salvar/alterar
        if ($id > 0){
            $consulta = 'DELETE FROM contatos WHERE id = :id';
            $query = $conexao->prepare($consulta);
            $query->bindValue(':id', $id);
            if ($query->execute())
                header('location: listar_contatos.php');
            else{
                echo 'Erro ao salvar dados. Erro: ';
                var_dump($query->errorInfo());
            }
        }else
            header('location: listar_contatos.php');
    }
}


?>