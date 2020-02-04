<?php

class Postagem{
    //metodo que chama o banco de dados
    public static function selecinaTodos(){
        $con = Connection::getConn();

        //Pegando as coisas do Banco de dados
        $sql = "SELEC * FROM postagem ORDER BY id DESC" ;
        $sql = $con->prepare($sql); //tratamento do que vai por negocio la
        $sql->execute();

        var_dump($sql->fetchAll()); // fetchAll() -> lista todos os resultados

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

}

//QueryString usado para passar informações via url