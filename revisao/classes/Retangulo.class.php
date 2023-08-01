<?php
    
class Retangulo extends Forma{
    /**
     * Atributos da classe
     */
    private $altura;

     public function __construct($id, $base, $altura, $cor){
         parent::__construct($id, $base, $cor, 'px');
         $this->setAltura($altura);
     }

     public function inserir(){
         $sql = 'INSERT INTO retangulo (altura, base, cor, un)
                      VALUES (:altura,:base, :cor, :un)';
         $params = array(':altura'=>$this->getAltura(),
                         ':base'=>$this->getBase(),
                         ':cor'=>$this->getCor() ,
                         ':un'=>$this->getUn());
        
        return Database::executar($sql, $params);
     }

     public function excluir(){
         $sql = 'DELETE FROM retangulo 
                  WHERE id = :id';         
         $params = array(':id'=>$this->getId());         
         return Database::executar($sql, $params);
     }

     public function editar(){
         $sql = 'UPDATE retangulo
                    SET base = :base,
                        altura = :altura,
                        cor  = :cor,
                        un   = :un
                  WHERE   id = :id';
         $params = array(':id'=>$this->getId(),
                         ':base'=> $this->getBase(),
                         ':altura'=> $this->getAltura(),
                         ':cor'=> $this->getCor(),
                         ':un'=> $this->getUn());
        return Database::executar($sql, $params);
        
     }
  
     public static function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM retangulo';
        switch($tipo){
            case 1: $sql .= ' WHERE id = :info'; break;
            case 2: $sql .= ' WHERE cor like :info';  break;
        }           
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        $lista = Database::listar($sql, $params);
        $rets = array();
        foreach($lista as $q){
            array_push($rets,new Retangulo($q['id'], $q['base'],$q['altura'],$q['cor']));
        }
        return $rets;
     }

     public function desenhar(){
        $desenho = "<div draggable='true' class='desenho' 
                    style='width:{$this->getBase()}{$this->getUn()};
                     height:{$this->getAltura()}{$this->getUn()};
                     background-color:{$this->getCor()}'></div>";
        return $desenho;
     }

     public function getBase(){return $this->getLado();}
     public function getAltura(){return $this->altura;}
     public function setBase($base){
        $this->setLado($base);
     }
     public function setAltura($altura){
        if ($altura > 0)
            $this->altura = $altura;
        else
            throw new Exception('Altura inválida. A altura do retângulo deve ser maior que 0');
     }
     public function calcularArea(){
      return $this->getBase()*$this->getAltura();
     }

     public function calcularPerimetro(){
        echo 'TODO: a fazer';
     }

}

?>