<?php
    
class Quadrado extends Forma{
    /**
     * Atributos da classe
     */

     public function __construct($id, $lado, $cor, $un){
         parent::__construct($id, $lado, $cor, $un);
     }

     public function inserir(){
         $sql = 'INSERT INTO quadrado (lado, cor, un)
                      VALUES (:lado, :cor, :un)';
         $params = array(':lado'=>$this->getLado(),
                         ':cor'=>$this->getCor() ,
                         ':un'=>$this->getUn());
        
        return Database::executar($sql, $params);
     }

     public function excluir(){
         $sql = 'DELETE FROM quadrado 
                  WHERE id = :id';         
         $params = array(':id'=>$this->getId());         
         return Database::executar($sql, $params);
     }

     public function editar(){
         $sql = 'UPDATE quadrado
                    SET lado = :lado,
                        cor  = :cor,
                        un   = :un
                  WHERE   id = :id';
         $params = array(':id'=>$this->getId(),
                         ':lado'=> $this->getLado(),
                         ':cor'=> $this->getCor(),
                         ':un'=> $this->getUn());
        return Database::executar($sql, $params);
        
     }
  
     public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM quadrado';
        switch($tipo){
            case 1: $sql .= ' WHERE id = :info'; break;
            case 2: $sql .= ' WHERE cor like :info';  break;
        }           
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        $lista = Database::listar($sql, $params);
        $quadrados = array();
        foreach($lista as $q){
            $quadrado = new Quadrado($q['id'], $q['lado'],$q['cor'],$q['un']);
            array_push($quadrados,$quadrado);
        }
        return $quadrados;
     }

     public function desenhar(){
        $desenho = "<div draggable='true' class='desenho' 
                    style='width:{$this->getLado()}{$this->getUn()};
                     height:{$this->getLado()}{$this->getUn()};
                     background-color:{$this->getCor()}'></div>";
        return $desenho;
     }

     public function calcularArea(){
      return $this->getLado()*$this->getLado();
     }

     public function calcularPerimetro(){
        echo 'TODO: a fazer';
     }

}

?>