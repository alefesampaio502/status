<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<?php
$infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
$infoSite->execute();
$infoSite = $infoSite->fetch();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS --> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/stylo.css">
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/fonts/all.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/popper.min.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/slidewr.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- titulo do site-->
  <title><?php echo $infoSite['titulo']; ?></title>

  <meta name="author" content="Status web" />
  <meta name="keywords" content="sistemas web,cursos de programação,desenvolvimento web,html5,css3,design responsivo,php,mysql,aprender programação">
  <meta name="description" content="Este é um site desenvolvido por Status Code.">
  <link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon" />
  <meta charset="utf-8" />
</head>
<body base="<?php echo INCLUDE_PATH; ?>">
<?php
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';
    switch ($url) {
      case 'empresa':
        echo '<target target="empresa" />';
        break;
        case 'equipe':
        echo '<target target="equipe" />';
        break;

      case 'servicos':
        echo '<target target="servicos" />';
        break;
    }
  ?>
  <!--- Inicio do menu com nave bar-->
  <!-- <!-- <section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
     <div class="container">

      <a class="navbar-brand logo" href="#"><span>Status.code</span></a>
<div class="clear"></div><!--clear-->
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon "></span>
      </button>


      <div class="collapse navbar-collapse ml-auto" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a data-scroll class="nav-link" href="#slider">HOME</a>
          </li>         
          <li class="nav-item">
            <a data-scroll class="nav-link" href="#empresa">EMPRESA</a>
          </li>
          <li class="nav-item">
            <a data-scroll class="nav-link"  href="#servicos">SERVIÇO</a>
          </li>
          <li class="nav-item">
            <a data-scroll class="nav-link" href="#equipe">EQUIPE</a>
          </li>
          <li class="nav-item">
            <a data-scroll class="nav-link " href="#produto">PRODUTO</a>
          </li>
          <li class="nav-item">
            <a data-scroll class="nav-link " href="#sucesso">SUCESSO</a>
          </li>
          <li class="nav-item">
            <a data-scroll  class="nav-link " href="#contato">CONTATO</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</section> --> -->
<!--- fim do menu com nave bar-->

  <?php

    if(file_exists('pages/'.$url.'.php')){
      include('pages/'.$url.'.php');
    }else{
      //Podemos fazer o que quiser, pois a página não existe.
      if($url != 'depoimentos' && $url != 'servicos'){
        $urlPar = explode('/',$url)[0];
        if($urlPar != 'noticias'){
        $pagina404 = true;
        include('pages/404.php');
        }else{
          include('pages/noticias.php');
        }
      }else{
        include('pages/home.php');

      }
    }

  ?>

<!---------------------footer------------------>
<section id="footer">
  <div class="container text-center">
    <p>Feito com muito <i class="far fa-heart"></i> por Status.code</p>
  </div>
  
</section>

<!--------------Script js.--------------->
<!---Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
<script src="js/all.js"></script>
<script src="js/slider.js"></script>
<script src="js/smooth-scroll.js"></script>
</body>
</html>