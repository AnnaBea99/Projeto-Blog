<?php

// O core irá fazer a leitura de qual página o usuário está acessando
// Basicamente o cerebro do site todo
//Ler as exibições do Get e as requisições html do usuário

class Core{

    public function start($urlGet){

        //Variavel para chamar o metodo para exibir o conteudo que está no Home controller
        $acao = 'index';

        // Definindo o que a pagina vai receber a urlget no parametro pagina
        //Todas as páginas irçao iniciar com ?pagina= algumacoisa
        //Verificar qual pagina ele está acessando (ucfirst deixa a letra maiuscula) 
        //O if está definindo o controller deve abrir, ou seja a Home
        //se não didigtar a pagina vai abrir a home
        if(isset($urlGet['pagina'])){
            $controller = ucfirst($urlGet['pagina'].'Controller');
        }else{
            $controller = 'HomeController';
        }

        if(!class_exists($controller)){
            $controller ='ErroController';
        }
        
        //Fazendo a variavel chamar o home e o metodo
        //Criando um arry com um objeto da classe controller
        //Este método e o objeto da classe controller será possivel executar o conteudo
        call_user_func_array(array(new $controller, $acao), array());

    }
}