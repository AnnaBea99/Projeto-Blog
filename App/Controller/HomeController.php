<?php

// O controller vai exibir a pagina solicitada
class HomeController{

    public function index() {
        
        try {

        //Por ser uma função estatica, não precisa instancia-lo, dá para chama-lo com os ::
        $colecPostagens = Postagem::selecinaTodos();

        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('home.html');

        $parametros = array();
        $parametros['nome'] = 'Anna';

        $conteudo = $template->render($parametros);
        echo $conteudo;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        

    }
}
