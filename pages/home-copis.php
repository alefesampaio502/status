
<!--- SLIDE-->
<div id="slider">
	
	<div id="headerSlider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
    <li data-target="#headerSlider" data-slide-to="1"></li>
    <li data-target="#headerSlider" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
   
    <div class="carousel-item active">
      <img src="img/01.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption ">
        <h5>Desenvolvimento de aplicativos mobile</h5>
        <p>Somos uma empresa especializada em criar soluções digitais para seu negócio.</p>
      </div>
    </div>

  <?php
          $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.slides` ORDER BY order_id ASC LIMIT 8");
          $sql->execute();
          $sliders = $sql->fetchAll();
          foreach ($sliders as $key => $value) {
            var_dump($value);
          ?>
  <div style="background-image: url('<?php echo INCLUDE_PATH ?>painel/uploads/<?php  echo $value['slide']; ?>');" class="banner-single"></div><!--banner-single-->
   <?php }?>
    <div class="carousel-item">
      <img src="<?php echo INCLUDE_PATH ?>painel/uploads/<?php  echo $value['slide']; ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption ">
       <h5><?php  echo $value['titulo']; ?></h5>
        <p><?php  echo $value['descricao']; ?></p>
      </div>
    </div>
    <?php }?>
   
  </div>
  <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>

<!--- FIM SLIDE-->

<!---------- Empresa--------------->
<section id="empresa">
<div class="container">
<div class="row">
<div class="col-md-6">
<h2>Empresa</h2>
<div class="empresa-content">
  <?php echo $infoSite['descricao']; ?>.
</div>
    <button type="button" class="btn btn-warning">Veja mais </button>
</div>

<div class="col-md-6 skills-bar">
  <h3 class="text-center">Somos expecialista em !</h3>
  <p>Sistema de Estoque</p>
   <div class="progress">
    <div class="progress-bar  " style="width: 100%;">100%</div>
  </div>
  <p>Sistema  em PHP, React e .node</p>
   <div class="progress">
    <div class="progress-bar  " style="width: 100%;">100%</div>
  </div>
  <p>UI Design</p>
   <div class="progress">
    <div class="progress-bar  " style="width: 100%;">100%</div>
  </div>
  <p>Sites em WordPress</p>
   <div class="progress">
    <div class="progress-bar  " style="width: 80%;">80%</div>
  </div>
</div>
</div>

</section>

<!---------- Serviço--------------->
<section id="servicos">
<div class="container">
  <h1><?php echo $infoSite['mensagem5']; ?></h1>
<div class="row servicos">
  <div class="col-md-3 text-center">
    <div class="icon">
      <i class="<?php echo $infoSite['icone1']; ?>"></i>
    </div>
    <h3>Web Development</h3>
    <p><?php echo $infoSite['descricao1']; ?></p>
</div>
<div class="col-md-3 text-center">
    <div class="icon">
      <i class="<?php echo $infoSite['icone1']; ?>"></i>
    </div>
    <h3>App Development</h3>
    <p><?php echo $infoSite['descricao2']; ?></p>
</div>
<div class="col-md-3 text-center">
    <div class="icon">
      <i class="<?php echo $infoSite['icone3']; ?>"></i>
    </div>
    <h3>Digital Marketing</h3>
    <p><?php echo $infoSite['descricao3']; ?></p>
</div><div class="col-md-3 text-center">
    <div class="icon">
      <i class="<?php echo $infoSite['icone4']; ?>"></i>
    </div>
    <h3>Web Designer</h3>
    <p><?php echo $infoSite['descricao4']; ?></p>
</div>
</div>
</div>  
</section>
<!---------- Nosso time--------------->
<section id="equipe">
  <div class="container">
    <h1><?php echo $infoSite['mensagem1']; ?></h1>
    <div class="row">
      <?php
          $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.equipe` ORDER BY order_id ASC LIMIT 4");
          $sql->execute();
          $equipes = $sql->fetchAll();
          foreach ($equipes as $key => $value) {
          ?>
      <div class="col-md-3 profile-pic text-center danger">
        <div class="img-box">
          <img src="<?php echo INCLUDE_PATH ?>painel/uploads/<?php  echo $value['foto']; ?>" class="img-responsive" width="200" height="220">  
          <ul>
            <a href="<?php  echo $value['link_face']; ?>"><li><i class="fab fa-facebook"></i></li></a>
            <a href="<?php  echo $value['link_inst']; ?>"><li><i class="fab fa-instagram"></i></li></a>
            <a href="<?php  echo $value['link_yutube']; ?>"><li><i class="fab fa-youtube"></i></li></a>
          </ul>
        </div>
          <h2><?php  echo substr(strip_tags($value['nome']),0,18).'...' ?></h2>
          <h3><?php  echo $value['titulo']; ?></h3>  
          <p><?php  echo $value['descricao']; ?></p>    
        </div>
         <?php }?>
      </div>
    </div>  
</section>
<!---------- promoção--------------->
<section id="promo">
  <div class="container">
    <p><?php echo $infoSite['mensagem_promo']; ?></p>
    <a href="#contato" class="btn btn-primary">Contato</a>
  </div>
</section>
<!---------- Produto--------------->
<section id="produto">
  <div class="container">
    <h1><?php echo $infoSite['mensagem2']; ?> </h1>
    <div class="row">
      <div class="col-md-3">
        <div class="single-price">
          <div class="price-header">
          <h2>Solis.code</h2>
          <p>R$ 0/<span>Mês</span></p>
        </div>
        <div class="price-content">
          <ul>
            <li><i class="fas fa-check-circle"></i> Gratuito</li>
            <li><i class="fas fa-check-circle"></i> 5GB Space</li>
            <li><i class="fas fa-times-circle"></i> 5GB Space</li>
            <li><i class="fas fa-times-circle"></i> 5GB Space</li>
            <li><i class="fas fa-times-circle"></i> 5GB Space</li>
          </ul>
        </div>
        <div class="price-button">
          <a class="buy-btn" href="#">Acessar Free</a>
        </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="single-price">
          <div class="price-header">
          <h2>PlusSolis</h2>
          <p>R$ 54/<span>Mês</span></p>
        </div>
        <div class="price-content">
          <ul>
            <li><i class="fas fa-check-circle"></i> 10GB Space</li>
            <li><i class="fas fa-check-circle"></i> 100GB Space</li>
            <li><i class="fas fa-times-circle"></i> 200GB Space</li>
            <li><i class="fas fa-times-circle"></i> 300GB Space</li>
            <li><i class="fas fa-times-circle"></i> Suporte</li>
          </ul>
        </div>
        <div class="price-button">
          <a class="buy-btn" href="#">Acessar Free</a>
        </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="single-price">
          <div class="price-header">
          <h2>PlusSolis</h2>
          <p>R$ 54/<span>Mês</span></p>
        </div>
        <div class="price-content">
          <ul>
            <li><i class="fas fa-check-circle"></i> 10GB Space</li>
            <li><i class="fas fa-check-circle"></i> 100GB Space</li>
            <li><i class="fas fa-times-circle"></i> 200GB Space</li>
            <li><i class="fas fa-times-circle"></i> 300GB Space</li>
            <li><i class="fas fa-times-circle"></i> Suporte</li>
          </ul>
        </div>
        <div class="price-button">
          <a class="buy-btn" href="#">Acessar Free</a>
        </div>
        </div>
      </div>

<div class="col-md-3">
        <div class="single-price">
          <div class="price-header">
          <h2>PlusSolis</h2>
          <p>R$ 54/<span>Mês</span></p>
        </div>
        <div class="price-content">
          <ul>
            <li><i class="fas fa-check-circle"></i> 10GB Space</li>
            <li><i class="fas fa-check-circle"></i> 100GB Space</li>
            <li><i class="fas fa-times-circle"></i> 200GB Space</li>
            <li><i class="fas fa-times-circle"></i> 300GB Space</li>
            <li><i class="fas fa-times-circle"></i> Suporte</li>
          </ul>
        </div>
        <div class="price-button">
          <a class="buy-btn" href="#">Acessar Free</a>
        </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!---------- casso de Sucesso --------------->
<section id="sucesso">
  <div class="container">
    <h1><?php echo $infoSite['mensagem3']; ?></h1>
    <p class="text-center">You can also use the text-shadow property to create a plain border around some text (without shadows):</p>
  <div class="row">
    <div class="col-md-4 text-center">
      <div class="profile">
        <img src="img/statuss.png" width="250" class="user">
        <blockquote>De acordo com pesquisa realizada em 2016 e com resultados apresentados.</blockquote>
        <h3>Pr. Raimundo <span>Co-Fundador CEO</span></h3>
      </div>
    </div>

    <div class="col-md-4 text-center">
      <div class="profile">
        <img src="img/team.png" width="250" class="user">
        <blockquote>De acordo com pesquisa realizada em 2016 e com resultados apresentados.</blockquote>
        <h3>Míssia Alencar <span>Co-Fundador Designer</span></h3>
      </div>
    </div>
    <div class="col-md-4 text-center">
      <div class="profile">
        <img src="img/team.jpg" width="250" class="user">
        <blockquote>De acordo com pesquisa realizada em 2016 e com resultados apresentados.</blockquote>
        <h3>Alefe Sampaio <span>Co-Fundador PHP React</span></h3>
      </div>
    </div>
  </div>
</div>
</section>
<!----------Contato--------------->
<section id="contato">
  <div class="container">
    <h1><?php echo $infoSite['mensagem4']; ?></h1>
    <div class="row">
      <div class="col-md-6">
        <form class="contato-form">
          <div class="form-group">
            <input type="text" name="" class="form-control" placeholder="Digite seu Nome">
          </div>
          <div class="form-group">
            <input type="number" name="" class="form-control" placeholder="Digite seu Telefone">
          </div>
          <div class="form-group">
            <input type="email" name="" class="form-control" placeholder="Digite seu E-mail">
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="4" placeholder="Mensagem"></textarea>
          </div>
          <div class="text-center">
          <button type="submit" class="btn btn-primary generica">Enviar Mensagem</button></div>
        </form>
      </div>
      <div class="col-md-6 contato-info">       
      <div class="fale"><b>Endereço :</b> <i class="fas fa-map-marker-alt"></i>   Rua do Abacate número 200</div>   
              
      <div class="fale"><b>Fone :</b> <i class="fas fa-phone-alt"></i> (99)991794905</div>    
            
      <div class="fale"><b>E-mail :</b> <i class="fas fa-envelope"></i> </i> status@gmail.com</div> 
      <div class="fale"><label><b>Rede social</b></label>
       <a href="#"><i class="redes fab fa-facebook"></i></a>
       <a href="#"><i class="redes fab fa-youtube"></i></a>
       <a href="#"><i class="redes fab fa-twitter"> </i></a>
       <a href="#"><i class="redes fab fa-google-plus"> </i></a>
         <div class="clear"></div>
      </div>    
      </div>
    </div>
  </div>
</section>