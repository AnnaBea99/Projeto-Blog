<?php

//O index é a pagina cerragda automaticamente pelo navegador
// Se não for index o nome do arquivo ele mostrará a estrutura normal de arquivos com .php

//fazendo o chamado da classe core
require_once 'App/Core/Core.php';

//Fazendo a importação do controller Home
require_once 'App/Controller/HomeController.php';
require_once 'App/Controller/ErroController.php';

//Chamando a classe de Postagem 
require_once 'App/Model/Postagem.php';

//Chamando a classe connection
require_once 'Lib/DataBase/Connection.php';

//chamando o twig autoload chama tudo
require_once 'vendor/autoload.php';

$template = file_get_contents('App/Template/estrutura.html');

//Colocar o que vai ser exibido na área dinamica do codigo
//Tudo o que estiver dentro dessa função(?) vai armazenar e 
//Jogar na variável $saida
ob_start();
    $core = new Core;
    //chamando a função
    $core->start($_GET);
$saida = ob_get_contents();
ob_end_clean();

//Faz a substituição e coloca o que está no controller
$tplpronto = str_replace('{{area_dinamica}}', $saida, $template);
echo $tplpronto;