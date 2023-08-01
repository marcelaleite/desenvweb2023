<?php
// controller para classe retângulo
require_once('../autoload.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    // APRESENTAR O FORMULÁRIO PARA USUÁRIO
    $id = isset($_GET['id'])?$_GET['id']:0;
    $formulario = file_get_contents('formulario.html');
    if ($id > 0 ){
        // Apresentar dados
        $retangulo = Retangulo::listar(1,$id)[0];
        $formulario = str_replace('{id}',$retangulo->getId(),$formulario);
        $formulario = str_replace('{base}',$retangulo->getBase(),$formulario);
        $formulario = str_replace('{altura}',$retangulo->getAltura(),$formulario);
        $formulario = str_replace('{cor}',$retangulo->getCor(),$formulario);
    }else{
        $formulario = str_replace('{id}','',$formulario);
        $formulario = str_replace('{base}','',$formulario);
        $formulario = str_replace('{altura}','',$formulario);
        $formulario = str_replace('{cor}','',$formulario);
    }
    print($formulario);
}else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // INSERIR OU EDITAR
    $id = isset($_POST['id'])?$_POST['id']:0;
    $base = isset($_POST['base'])?$_POST['base']:0;
    $altura = isset($_POST['altura'])?$_POST['altura']:0;
    $cor = isset($_POST['cor'])?$_POST['cor']:'';
    try{
        $retangulo = new Retangulo($id,$base,$altura,$cor);
        if ($id > 0) // update
            $retangulo->editar();
        else
            $retangulo->inserir();
    }catch(Exception $e){
        echo 'Erro ao atualizar dados: '.$e->getMessage();
    }
}

?>