<?php
$id = isset($_POST['id'])?$_POST['id']:0;
$lado = isset($_POST['lado'])?$_POST['lado']:0;
$cor = isset($_POST['cor'])?$_POST['cor']:'';
$un = isset($_POST['un'])?$_POST['un']:'';
$acao = isset($_POST['acao'])?$_POST['acao']:'';
if ($acao == 'salvar'){
    try{
        require_once('classes/quadrado.class.php');
        $quadrado = new Quadrado($id,$lado,$cor,$un);
        if ($id > 0)
            $quadrado->editar();
        else
            $quadrado->inserir();
        header('location:index.php');   

    }catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
}else if($acao == 'excluir'){
    try{
        require_once('classes/quadrado.class.php');
        $quadrado = new Quadrado($id,$lado,$cor,$un);
        $quadrado->excluir();
        header('location:index.php');   

    }catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
}
?>  