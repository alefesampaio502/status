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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS --> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/stylo.css">
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/fonts/all.css">

  <!-- titulo do site-->
  <title><?php echo $infoSite['titulo']; ?></title>
  <meta name="author" content="CODE STATUS" />
  <meta name="keywords" content="Nós Somos a agencia Code status">
  <meta name="description" content="Este  site  Foi desenvolvido por CODE STATUS.">
  <link rel="icon" href="<?php echo INCLUDE_PATH; ?>img/favicon.ico" type="image/x-icon" />
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
  
  <section id="nav-bar " class="header" >
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div id="logo">
        <a class="navbar-brand" href="#"><img src="img/logo.png"></a>
      </div>
      <div id="sideNav">
        <ul>
          <li class="nav-item">
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
      <div id="menuBtn">
        <img src="img/menu.png" id="menu" class="menus">
      </div>
    </nav>
  </section>

<div class="clear"></div>
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
      <p>Feito com muito <i class="far fa-heart"></i> por © Code Status</p>
    </div>
   
  </section>
 <a title="Voltar ao topo" aria-label="Voltar ao topo" rel="nofollow" href="#" class="generate-back-to-top bg-danger" style="opacity: 1; 		visibility: visible;" data-scroll-speed="400" data-start-scroll="300">
    </a>
  <!--------------Script js.--------------->
  <!---Jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script src=""></script>
  <script src="js/all.js"></script>
  <script src="js/smooth-scroll.js"></script>
  <script src="js/digita.js"></script>

</body>
</html>
