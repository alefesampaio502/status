<?php 
$site = Painel::select('tb_site.config',false);
?>

<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Configurações do Site</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
		if(isset($_POST['acao'])){
			if(Painel::update($_POST,true)){
				Painel::alert('sucesso','O site foi editado com sucesso!');
				$site = Painel::select('tb_site.config',false);
			}else{
				Painel::alert('erro','Campos vázios não são permitidos.');
			}
		}


		?>

		<div class="form-group">
			<label>Título do site:</label>
			<input type="text" name="titulo" value="<?php echo $site['titulo'] ?>" />
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome da Empresa:</label>
			<input type="text" name="empresa" value="<?php echo $site['empresa'] ?>" />
		</div><!--form-group-->

		<div class="form-group">
			<label>Descrição de atividade da empresa:</label>
			<textarea  class="tinymce" name="descricao"><?php echo $site['descricao']; ?></textarea>
		</div><!--form-group-->
		
		<div class="form-group">
			<label>Proção do site:</label>
			<input type="text" name="mensagem_promo" value="<?php echo $site['mensagem_promo'] ?>" />
		</div><!--form-group-->

		<?php
		for($i = 1; $i <= 5; $i++){
			
			?>
			<div class="form-group">
				<label>Mensagem<?php echo $i; ?>:</label>
				<input type="text" name="mensagem<?php echo $i; ?>" value="<?php echo $site['mensagem'.$i] ?>" />
			</div><!--form-group-->

		<?php } ?>
		<hr>
		<?php
		for($i = 1; $i <= 4; $i++){
			?>

			<div class="form-group">
				<label>Ícone <?php echo $i; ?>:</label>
				<input type="text" name="icone<?php echo $i; ?>" value="<?php echo $site['icone'.$i] ?>" />
			</div><!--form-group-->

			<div class="form-group">
				<label>Descrição do ícone <?php echo $i; ?>:</label>
				<textarea name="descricao<?php echo $i; ?>"><?php echo $site['descricao'.$i]; ?></textarea>
			</div><!--form-group-->

		<?php } ?>
		<div class="form-group">
			<label>Ativo:</label>
			<select name="ativo">
				<option value="1">Sim</option>
				<option value="0">Não</option>
			</select>
		</div><!--form-group-->

		
		<div class="form-group">
			<input type="hidden" name="nome_tabela" value="tb_site.config" />
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->
		
	</form>

</div><!--box-content-->
