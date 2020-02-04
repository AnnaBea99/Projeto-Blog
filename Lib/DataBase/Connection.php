<?php
// a classe conexção com o padrão sielgton(?) vai servir para criar apenas UMA instancia desse objeto conexção, se o sistema tentar criar 
//uma nova instancia, ele irá retornar a instancia já criada.

//tem que ser uma classe abstrata para ela não poder ser instanciada "automaticamente"
abstract class Connection{
    private static $conn;

    public static function getConn(){

        //Fazendo a verficação do atributo está vazio
        if (self::$conn == null){
        
        //quando o atributo é estatico usa-se o self se não usa o $this 
        self::$conn = new PDO('mysql: host=localhost; dbname=banco_postagens;', 'root', '');

        }    
        return self::$conn;
    }
}

