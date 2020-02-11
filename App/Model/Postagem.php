<?php

class Postagem{
    //metodo que chama o banco de dados
    public static function selecinaTodos(){
        $con = Connection::getConn();

        //Pegando as coisas do Banco de dados
        $sql = "SELECT * FROM postagem ORDER BY id DESC" ;
        $sql = $con->prepare($sql); //tratamento do que vai por negocio la
        $sql->execute();

        // var_dump($sql->fetchAll()); // fetchAll() -> lista todos os resultados

        //Mostrando o conteudo
        $resultado = array();

        while($row = $sql->fetchObject('Postagem')){
            $resultado[] = $row;
        }

        if (!$resultado) {
         throw new Exception("Não foi encontrado nenhum registro");  
        }

        return $resultado;

    }
//pegando os id das postagens
    public static function selecionaPorId($idPost){
        $con = Connection::getConn();

        $sql = "SELECT * FROM postagem WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $resultado = $sql->fetchObject('Postagem');

        if(!$resultado){
            throw new Exception("Não foi encontrado nenhum registro");
        }
        return $resultado;
    }

}

//QueryString usado para passar informações via url