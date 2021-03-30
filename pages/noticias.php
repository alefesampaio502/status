
<?php
  $url = explode('/',$_GET['url']);
  if(!isset($url[2]))
  {
  $categoria = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
  $categoria->execute(array(@$url[1]));
  $categoria = $categoria->fetch();
?>

<section id="equipe" class="bg-light mt-0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="mt-5"><?php echo $infoSite['mensagem1']; ?></h1>
      </div>
      <div>
<?php
              $porPagina = 10;
              if(!isset($_POST['parametro'])){
              if($categoria['nome'] == ''){
                
              }else{
                echo '<h2>Visualizando Posts em <span>'.$categoria['nome'].'</span></h2>';
              }
              }else{
                echo '<h2><i class="fa fa-check"></i> Busca realizada com sucesso!</h2>';
              }

              $query = "SELECT * FROM `tb_site.noticias` ";
              if($categoria['nome'] != ''){
                $categoria['id'] = (int)$categoria['id'];
                $query.="WHERE categoria_id = $categoria[id]";
              }
              if(isset($_POST['parametro'])){
                if(strstr($query,'WHERE') !== false){
                  $busca = $_POST['parametro'];
                  $query.=" AND titulo LIKE '%$busca%'";
                }else{
                  $busca = $_POST['parametro'];
                  $query.=" WHERE titulo LIKE '%$busca%'";
                }
              }
              $query2 = "SELECT * FROM `tb_site.noticias` "; 
              if($categoria['nome'] != ''){
                  $categoria['id'] = (int)$categoria['id'];
                  $query2.="WHERE categoria_id = $categoria[id]";
              }
              if(isset($_POST['parametro'])){
                if(strstr($query2,'WHERE') !== false){
                  $busca = $_POST['parametro'];
                  $query2.=" AND titulo LIKE '%$busca%'";
                }else{
                  $busca = $_POST['parametro'];
                  $query2.=" WHERE titulo LIKE '%$busca%'";
                }
              }
              $totalPaginas = MySql::conectar()->prepare($query2);
              $totalPaginas->execute();
              $totalPaginas = ceil($totalPaginas->rowCount() / $porPagina);
              if(!isset($_POST['parametro'])){
                if(isset($_GET['pagina'])){
                  $pagina = (int)$_GET['pagina'];
                  if($pagina > $totalPaginas){
                    $pagina = 1;
                  }
                  
                  $queryPg = ($pagina - 1) * $porPagina;
                  $query.=" ORDER BY order_id ASC LIMIT $queryPg,$porPagina";
                }else{
                  $pagina = 1;
                  $query.=" ORDER BY order_id ASC LIMIT 0,$porPagina";
                }
              }else{

                $query.=" ORDER BY order_id ASC";
              }
              $sql = MySql::conectar()->prepare($query);
              $sql->execute();
              $noticias = $sql->fetchAll();
            ?>
         
          <?php
            foreach($noticias as $key=>$value){
            $sql = MySql::conectar()->prepare("SELECT `slug` FROM `tb_site.categorias` WHERE id = ?");
            $sql->execute(array($value['categoria_id']));
            $categoriaNome = $sql->fetch()['slug'];
          ?>
         <div class="col-md-3 profile-pic text-center danger animate__animated animate__bounce__delay-3s animate__slideInDown">
            <div class="img-box">
              <img src="<?php echo INCLUDE_PATH ?>painel/uploads/<?php  echo $value['capa']; ?>" class="img-responsive" width="350" height="220">  
              <ul>
                <a href="<?php  echo $value['link_face'];?>"target="_blank"><li><i class="fab fa-facebook"></i></li></a>
                <a href="<?php  echo $value['link_inst'];?>"target="_blank"><li><i class="fab fa-instagram"></i></li></a>
                <a href="<?php  echo $value['link_yutube'];?>"target="_blank"><li><i class="fab fa-youtube"></i></li></a>
              </ul>
            </div>
            <h2><?php  echo substr(strip_tags($value['nome']),0,50)?></h2>
            <span><?php  echo substr(strip_tags($value['titulo']),0,38)?></span>  
            <p class="text-left mt-2" style="font-size: 12"><?php echo substr(strip_tags($value['descricao']),0,85) ?></p>    
          </div>
          <?php } ?>
</div>
    </div>  

 <div class="container">
  <div class="col-10-md">
          <nav aria-label="Page navigation example center">
  <ul class="pagination" align="right">
            <?php
              if(!isset($_POST['parametro'])){
              for($i = 1; $i <= $totalPaginas; $i++){
                $catStr = ($categoria['nome'] != '') ? '/'.$categoria['slug'] : '';
                if($pagina == $i)
                 
                  echo'<li class="page-item active"><a class="page-link" href="'.INCLUDE_PATH.'noticias'.$catStr.'?pagina='.$i.'">'.$i.'</a></li>';
                 
                else
                  echo '<a href="'.INCLUDE_PATH.'noticias'.$catStr.'?pagina='.$i.'">'.$i.'</a>';
              }
              }
            ?>         
    </ul>
</nav>
</div>
</div>
 
  <div class="clear"></div>
</section>
<?php }else{ 
  include('noticia_single.php');
}
?>
<!---------- Nosso time------