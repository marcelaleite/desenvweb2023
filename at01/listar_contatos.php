<?php
    $id = ($_GET['id']?$_GET['id']:0);
    $nome = ($_GET['nome']?$_GET['nome']:'');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatos</title>   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Red+Hat+Display:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Contatos Cadastrados</h1>
    <div class='row'>
        <form action="" method="get">
            <div class='col-2'><span>Buscar:</span></div>
            <div class='col-5'><input type="search" name='nome' value="<?=$nome?>"></div>
            <div class='col-5'><button type='submit' name='buscar' value='buscar'>Buscar</button></div>
        </form>
    </div>
    <hr>
    <div class='row'>
        <div class='col-12'>
            <table id='listagem' class='dados'>
                <?php
                    
                    if ($id > 0){
                        echo "<div class='novo'>Cadastro inserido com sucesso!</div>";
                    }
                    // abrir conexão
                    require_once('config.inc.php');
                    $conexao = new PDO(MYSQL_DSN ,MYSQL_USUARIO, MYSQL_SENHA);
                    if (!$conexao){
                        echo 'Erro ao conectar';
                        die();   // interrompe a execução do script caso ocorra erro
                    }else{
                        // montar consulta
                        $consulta = 'SELECT * FROM contatos';
                        if ($nome != ''){
                            $consulta .= ' WHERE (nome LIKE :nome OR sobrenome LIKE :nome)';
                        }
                        $query = $conexao->prepare($consulta);

                        if ($nome != ''){
                            $query->bindValue(':nome','%'.$nome.'%');
                        }
                        $query->execute();
                        $contatos = $query->fetchAll();
                        
                        // listar dados
                        $str = '';
                        foreach($contatos as $contato){
                            $link = '<a href="cadastroContatos.php?id='.$contato['id'].'">Alterar</a>';
                            if ($id == $contato['id'])
                                $str = "class='destaque'";
                            echo "<tr {$str}><td>{$contato['id']}</td><td>{$contato['nome']}</td><td>{$contato['sobrenome']}</td><td>{$contato['email']}</td><td>{$link}</td></tr>";
                            $str = '';
                        }
                    }

                ?>
            </table>
        </div>
    </div>
</body>
</html>