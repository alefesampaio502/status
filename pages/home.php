
<!--- SLIDE-->
<div id="slider">
  <div id="headerSlider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
      <li data-target="#headerSlider" data-slide-to="1"></li>
      <li data-target="#headerSlider" data-slide-to="2"></li>
    </ol>
  <div class="carousel-inner">  
      <div class="carousel-item active" data-interval="6000">
        <img src="img/01.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>Somos a agencia Code status</h5>
          <p class="m-4">Somos uma empresa especializada em criar soluções digitais para seu negócio.</p>
        </div>
      </div>
      <?php
      $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.slides` ORDER BY order_id ASC LIMIT 8");
      $sql->execute();
      $sliders = $sql->fetchAll();
      foreach ($sliders as $key => $value) {
        ?>
        <div class="carousel-item" data-interval="7000">
          <img src="<?php echo INCLUDE_PATH ?>painel/uploads/<?php  echo $value['slide']; ?>" class="d-block w-100" alt="...">
          <div class="carousel-caption ">
           <h5>
            <a href="" class="typewrite" data-period="3500" data-type='[ "<?php  echo $value['nome']; ?>" ]'>
             <span class="wrap"></span>
           </a>
         </h5>
         <p><?php  echo $value['descricao']; ?></p>
       </div>   
     </div>
   <?php }?> 
 </div>
   <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span></a>
    <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
   <span class="sr-only">Next</span></a>
</div>
</div>

<!---------- Empresa--------------->
<?php if ($infoSite['ativo'] == '1') { ?>

<section id="empresa">
    <div class="container mt-5">
      <div class="titulo mt-5">
       <h2 class="mt-5 ">Nós Somos a agencia Code status </h2>
     </div>
     <div class="row">
      <div class="col-md-6 mt-5">
        <div class="empresa-content">
          <p class="text-xs-left animate__animated animate__bounce animate__backInDown text-secondary"><?php echo $infoSite['descricao']; ?>.</p>
           <div class="line">

          <span class="line-1"></span><br>
          <span class="line-2"></span><br>
          <span class="line-3"></span><br>
        </div>

        </div>
      </div>
      <div class="col-md-6 skills-bar mt-5 animate__animated animate__bounce__delay-3s animate__fadeInRightBig">
        <h2 class="text-center text-secondary mb-3 ">Elaboração do seu projeto</h2>
        <img src="img/team.png" class="img-fluid img-fluid z-depth-1">
      </div>
    </div>
</section>
<?php } ?>
<!---------- Serviço--------------->
<section id="servicos">
  <div class="container">
    <h1 class="mt-5"><?php echo $infoSite['mensagem5']; ?></h1>
    <div class="row servicos">

      <div class="col-md-3 text-center">
        <div class="icon">
          <i class="<?php echo $infoSite['icone1']; ?>"></i>
        </div>
        <h4>Desenvolvimento web</h4>
        <p class="text-left"><?php echo $infoSite['descricao1']; ?></p>
      </div>
      <div class="col-md-3 text-center">
        <div class="icon">
          <i class="<?php echo $infoSite['icone2']; ?>"></i>
        </div>
        <h4>Desenvolvimento móvel</h4>
        <p class="text-left"><?php echo $infoSite['descricao2']; ?></p>
      </div>
      <div class="col-md-3 text-center">
        <div class="icon">
          <i class="<?php echo $infoSite['icone3']; ?>"></i>
        </div>
        <h4>UX & UI Designers</h4>
        <p class="text-left"><?php echo $infoSite['descricao3']; ?></p>
      </div><div class="col-md-3 text-center">
        <div class="icon">
          <i class="<?php echo $infoSite['icone4']; ?>"></i>
        </div>
        <h4>Web Designer</h4>
        <p class="text-left"><?php echo $infoSite['descricao4']; ?></p>
      </div>
    </div>
  </div>  
</section>
<!---------- Nosso time--------------->
<section id="equipe" class="bg-light mt-0">
  <div class="container ">
    <div class="row">
      <div class="col-md-12">
        <h1 class="mt-5"><?php echo $infoSite['mensagem1']; ?></h1>
      </div>
      <?php
      $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.equipe` ORDER BY order_id ASC LIMIT 3");
      $sql->execute();
      $equipes = $sql->fetchAll();
      foreach ($equipes as $key => $value) {
        if($value['ativo'] == '1'){
          ?>
          <div class="col-md-4 profile-pic text-center danger animate__animated animate__bounce__delay-3s animate__slideInDown">
            <div class="img-box">
              <img src="<?php echo INCLUDE_PATH ?>painel/uploads/<?php  echo $value['foto']; ?>" class="img-responsive" width="350" height="220">  
              <ul>
                <a href="<?php  echo $value['link_face'];?>"target="_blank"><li><i class="fab fa-facebook"></i></li></a>
                <a href="<?php  echo $value['link_inst'];?>"target="_blank"><li><i class="fab fa-instagram"></i></li></a>
                <a href="<?php  echo $value['link_yutube'];?>"target="_blank"><li><i class="fab fa-youtube"></i></li></a>
              </ul>
            </div>
            <h2><?php  echo substr(strip_tags($value['nome']),0,50)?></h2>
            <span><?php  echo substr(strip_tags($value['titulo']),0,38)?></span>  
            <p class="text-left mt-2" style="font-size: 10"><?php echo substr(strip_tags($value['descricao']),0,85) ?></p>    
          </div>
        <?php }}?>
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
      <h1 class="mt-5"><?php echo $infoSite['mensagem2']; ?> </h1>
      <div class="row mt-5">
       <?php
       $pro = MySql::conectar()->prepare("SELECT * FROM `tb_site.produto` ORDER BY order_id ASC LIMIT 4");
       $pro->execute();
       $produto = $pro->fetchAll();
       foreach ($produto as $key => $value) {
        ?>
        <div class="col-md-3">
          <div class="single-price">
            <div class="price-header">
              <h2><?php  echo $value['nome']; ?></h2>
              <p>R$: <?php  echo $value['preco']; ?></span></p>
            </div>
            <div class="price-content">
              <ul>
                <li><i class="<?php echo $value['icone1']; ?>"></i> <?php echo $value['msg1']; ?></li>
                <li><i class="<?php echo $value['icone2']; ?>"></i> <?php echo $value['msg2']; ?></li>
                <li><i class="<?php echo $value['icone3']; ?>"></i> <?php echo $value['msg3']; ?></li>
                <li><i class="<?php echo $value['icone4']; ?>"></i> <?php echo $value['msg4']; ?></li>
                <li><i class="<?php echo $value['icone5']; ?>"></i> <?php echo $value['msg5']; ?></li>
              </ul>
            </div>
            <div class="price-button">
              <a class="buy-btn" href="#">Acessar Free</a>
            </div>
          </div>
        </div>
      <?php }?>
    </div>
  </div>
</section>
<!---------- casso de Sucesso --------------->
<section id="sucesso">
  <div class="container mt-5">
    <h1><?php echo $infoSite['mensagem3']; ?></h1>
    <p class="text-center mb-5">You can also use the text-shadow property to create a plain border around some text (without shadows):</p>
    <div class="row">
     <?php
     $suce = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3");
     $suce->execute();
     $depoimentos = $suce->fetchAll();
     foreach ($depoimentos as $key => $value) {
      ?>
      <div class="col-md-4 text-center">
        <div class="profile">
          <img src="<?php echo INCLUDE_PATH ?>painel/uploads/<?php  echo $value['foto']; ?>" width="250" class="user">
          <blockquote><?php  echo $value['depoimento']; ?></blockquote>
          <h3><?php  echo $value['nome']; ?> <span> <?php  echo $value['funcao']; ?></span></h3>
        </div>
      </div>
    <?php }?> 
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
          <div class="fale"><b class="mr-1">Endereço:</b> <i class="fas fa-map-marker-alt"></i> Rua do Abacate número 200</div>   
          <div class="fale"><b class="mr-1">Fone:</b> <i class="fas fa-phone-alt"></i> (99)991794905</div>    
          <div class="fale"><b class="mr-1">E-mail:</b> <i class="fas fa-envelope"></i> </i> status@gmail.com</div> 
          <div class="fale"><label class="mt-2"><b>Rede social</b></label>
           <a href="#"><i class="redes fab fa-facebook "></i></a>
           <a href="#"><i class="redes fab fa-youtube"></i></a>
           <a href="#"><i class="redes fab fa-twitter"> </i></a>
           <a href="#"><i class="redes fab fa-google-plus"> </i></a>
           <div class="clear"></div>
         </div>    
       </div>
     </div>
   </div>
 </section>
