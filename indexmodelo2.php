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
  
  <section id="nav-bar" class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"><img src="img/logo.png"></a>
      <button class="navbar-toggler"  data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapse_target">
        <ul class="navbar-nav ml-auto">
         <li class="nav-item">
          <a data-scroll class="nav-link text-dark" href="#slider">HOME</a>
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
  </nav>
</section>


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

<!--------------Script js.--------------->
<!---Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>



<script src="js/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
<script src=""></script>
<script src="js/all.js"></script>
<script src="js/slider.js"></script>
<script src="js/smooth-scroll.js"></script>
<script type="text/javascript">
//made by vipul mirajkar thevipulm.appspot.com
var TxtType = function(el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
};

TxtType.prototype.tick = function() {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

  var that = this;
  var delta = 200 - Math.random() * 100;

  if (this.isDeleting) { delta /= 2; }

  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }

  setTimeout(function() {
    that.tick();
  }, delta);
};

window.onload = function() {
  var elements = document.getElementsByClassName('typewrite');
  for (var i=0; i<elements.length; i++) {
    var toRotate = elements[i].getAttribute('data-type');
    var period = elements[i].getAttribute('data-period');
    if (toRotate) {
      new TxtType(elements[i], JSON.parse(toRotate), period);
    }
  }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
      };

    </script>
  </body>
  </html>