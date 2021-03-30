
<?php 
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$produto = Painel::select('tb_site.produto','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
 ?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar produto</h2>

	<form method="post" enctype="multipart/form-data">

	<?php
			if(isset($_POST['acao'])){
				if(Painel::update($_POST)){
					Painel::alert('sucesso','O produto foi editado com sucesso!');
					$produto = Painel::select('tb_site.produto','id = ?',array($id));
				}else{
					Painel::alert('erro','Campos vázios não são permitidos.');
				}
			}
		?>



		<div class="form-group">
			<label>Nome :</label>
			<input type="text" name="nome" value="<?php echo $produto['nome'] ?>" />
		</div><!--form-group-->
		<div class="form-group">
			<label>Preço :</label>
			<input type="text" name="preco" value="<?php echo $produto['preco'] ?>" />
		</div><!--form-group-->
      <div class="form-group">
			<label>link :</label>
			<input type="text" name="link" value="<?php echo $produto['link'] ?>" />
		</div><!--form-group-->

       <?php
			for($i = 1; $i <= 5; $i++){
		   ?>

		<div class="form-group">
			<label>Ícone <?php echo $i; ?>:</label>
			<input type="text" name="icone<?php echo $i; ?>" value="<?php echo $produto['icone'.$i] ?>" />
		</div><!--form-group-->

		<div class="form-group">
			<label>Descrição do ícone <?php echo $i; ?>:</label>
			<textarea name="msg<?php echo $i; ?>"><?php echo $produto['msg'.$i]; ?></textarea>
		</div><!--form-group-->

		<?php } ?>
		
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="tb_site.produto" />
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

       
	</form>


</div><!--box-content-->