<?php
require_once('../autoload.php');

$lista = Retangulo::listar();
$lst_item = '';
foreach($lista as $el){
    $itens = file_get_contents('templates/itens.html');
    $itens = str_replace('{id}',$el->getId(),$itens);
    $itens = str_replace('{base}',$el->getBase(),$itens);
    $itens = str_replace('{altura}',$el->getAltura(),$itens);
    $itens = str_replace('{cor}',$el->getCor(),$itens);
    $itens = str_replace('{un}',$el->getUn(),$itens);
    $lst_item .= $itens;
}

$listagem = file_get_contents('templates/listagem.html');
$listagem = str_replace('{item}',$lst_item,$listagem);
print($listagem);

?>