<?php
class Quadro{
    private $id;
    private $nome;
    private $formas;
    
    public function __construct($id, $nome){
        $this->setId($id);
        $this->setNome($nome);
        $this->formas = array();
    }
    public function setId($id){ $this->id = $id;}
    public function setNome($nome){ $this->nome = $nome; }
    public function getNome(){return $this->nome;}
    public function getId(){return $this->id;}
    public function addForma(Forma $forma){
        $this->formas[] = $forma;
    }
    public function listarFormas(){
        foreach($this->formas as $forma){
            echo $forma->desenhar();
        }
    }

}

?>