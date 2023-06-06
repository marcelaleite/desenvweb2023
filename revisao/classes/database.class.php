<?php

class Database{
    public static function conectar(){
        try{
            require_once('../config/config.inc.php');
            $conexao = new PDO(MYSQL_DSN,MYSQL_USUARIO,MYSQL_SENHA );
            return $conexao;
        }catch(PDOException $e){
            echo "Erro ao conectar com o banco de dados. Verifique os parâmetros de configuração.";
        }
    }

    public static function executar($sql,$params = array()){
        $conexao = self::conectar();
        $comando = self::preparar($conexao, $sql, $params);
        return $comando->execute();
    }
    
    public static function listar($sql,$params){
        $conexao = self::conectar();
        $comando = self::preparar($conexao, $sql, $params);
        if ($comando->execute())
            return $comando->fetchAll();
    }

    public static function preparar($conexao, $sql, $params = array()){
        // ":lado"=>"12"
        $comando = $conexao->prepare($sql);
        foreach($params as $chave=>$valor){
            $comando->bindValue($chave,$valor);
        }
        return $comando;
    }
}


?>