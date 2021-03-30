<?php 

require_once 'app/Core/Core.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Model/Postagem.php';


$template = file_get_contents('app/Template/modelo.html');


ob_start();

	$core = new Core;
	$core->start($_GET);


	 $saida = ob_get_contents();

 ob_get_clean();


$tplPronto = str_replace('{{area_dinamica}}', $saida, $template);
//var_dump($saida);

echo $tplPronto;
?>