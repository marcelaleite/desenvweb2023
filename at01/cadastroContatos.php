<?php
$id = ($_GET['id']?$_GET['id']:0);

$contato = array();
if ($id > 0){

    // buscar dados para preencher o formulário
    // abrir conexão
    require_once('config.inc.php');
    $conexao = new PDO(MYSQL_DSN ,MYSQL_USUARIO, MYSQL_SENHA);
    if (!$conexao){
        echo 'Erro ao conectar';
        die();   // interrompe a execução do script caso ocorra erro
    }else{
        $consulta = 'SELECT * FROM contatos WHERE id = :id';      
        $query = $conexao->prepare($consulta);
        $query->bindValue(':id',$id);
        $query->execute();
        $contato = $query->fetch();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Contatos</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Red+Hat+Display:wght@300&display=swap" rel="stylesheet">
   <script src="scriptcontatos.js"></script>
</head>
<body>
    <h1>Cadastro de Amigos</h1>
    <div class='row'>
        <div class='col-12'>
            <form action="acaoContato.php" method='post'>
                <div class='row'>
                    <div class='col-2'>
                        <label for="id">Id:</label>
                    </div>
                    <div class='col-10'>
                        <input type="text" readonly name='id' id='id' value="<?php echo (isset($contato['id'])?$contato['id']:''); ?>" >
                    </div>
                </div>
                <div class='row'>
                    <div class='col-2'>
                        <label for="nome">Nome:</label>
                    </div>
                    <div class='col-4'>
                        <input type="text" name='nome' id='nome' value="<?php echo (isset($contato['nome'])?$contato['nome']:''); ?>">
                    </div>
                    <div class='col-2'>
                        <label for="nome">Sobrenome:</label>
                    </div>
                    <div class='col-4'>
                        <input type="text" name='sobrenome' id='sobrenome' value="<?php echo (isset($contato['sobrenome'])?$contato['sobrenome']:''); ?>">
                    </div>
                </div>
                <div class='row'>
                    <div class='col-2'>
                        <label for="email">
                            E-mail:
                        </label>
                    </div>
                    <div class='col-4'>
                        <input type="email" name='email' id='email'  value="<?php echo (isset($contato['email'])?$contato['email']:''); ?>" >
                    </div>
                    <div class='col-2'>
                        <label for="dtnasc">
                            Data de Nascimento:
                        </label>
                    </div>
                    <div class='col-4'>
                        <input type="date" name='dtnasci' id='dtnasci' value="<?php echo (isset($contato['dtnasci'])?$contato['dtnasci']:''); ?>" >
                    </div>
                </div>
                <div class='row'>
                    <div class='col-2'>
                        <label for="telefone">
                            Telefone:
                        </label>
                    </div>
                    <div class='col-4'>
                        <input type="phone" name='telefone' id='telefone'  value="<?php echo (isset($contato['telefone'])?$contato['telefone']:''); ?>" >
                    </div>
                    <div class='col-2'>
                        <label for="cidade">
                            Cidade:
                        </label>
                    </div>
                    <div class='col-4'>
                        <input type="text" list='cidades' name='cidade' id='cidade'  value="<?php echo (isset($contato['cidade'])?$contato['cidade']:''); ?>" >
                        <datalist id='cidades'></datalist>
                        <!-- <select name="cidade" id="cidade">
                            <option value="0">Escolha uma cidade</option> -->
                            <!-- <?php // include "lista_cidades.php"; 
                            // foreach ($cidades as $cidade)
                                // echo "<option value={$cidade['id']}>{$cidade['nome']}</option>";
                            ?> -->
                        <!-- </select> -->
                    </div>
                </div>
                <div class='row'>
                    <div class='col-2'>
                        <label for="obs">
                            Observações:
                        </label>
                    </div>
                    <div class='col-10'>
                        <textarea name="obs" id="obs" cols="30" rows="10"> <?php echo (isset($contato['obs'])?$contato['obs']:''); ?></textarea>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-2'>
                        <label for="vivo">
                            Vivo:
                        </label>
                    </div>
                    <div class='col-10'> 
                        <input type="checkbox" id='vivo' name='vivo' <?php echo ($contato['vivo']?'checked':''); ?> >
                    </div>
                </div>
                <div class='row'>
                    <div class='col-6'> 
                        <button name='acao' id='salvar' value='salvar' type='submit'>Salvar</button>    
                    </div>
                    <div class='col-6'> 
                    <?php 
                        if (isset($contato['id'])){
                            
                    ?>                    
                            <button name='acao' id='excluir' value='excluir' type='submit'>Excluir</button>    
                    <?php } ?>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</body>
</html>