<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$slide = Painel::select('tb_site.equipe','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Slide</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				//Enviei o meu formulário.
				
				$nome = $_POST['nome'];
				$titulo = $_POST['titulo'];
				$descricao = $_POST['descricao'];
				$slug = $_POST['slug'];
				$link_face 	= $_POST['link_face'];
				$link_inst 	= $_POST['link_inst'];
				$link_yutube = $_POST['link_yutube'];
				$ativo = $_POST['ativo'];
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_POST['imagem_atual'];
				
				if($imagem['name'] != ''){

					//Existe o upload de imagem.
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						$arr = ['nome'=>$nome,'titulo'=>$titulo,'descricao'=>$descricao,'slug'=>$slug,'link_face'=>$link_face,'link_inst'=>$link_inst,
						'link_yutube'=>$link_yutube,
						'foto'=>$imagem,'ativo'=>$ativo, 'id'=>$id,'nome_tabela'=>'tb_site.equipe'];
						Painel::update($arr);
						$slide = Painel::select('tb_site.equipe','id = ?',array($id));
						Painel::alert('sucesso','O Slide foi editado junto com a imagem!');
					}else{
						Painel::alert('erro','O formato da imagem não é válido');
					}
				}else{
					$imagem = $imagem_atual;
					$arr = ['nome'=>$nome,'titulo'=>$titulo,'descricao'=>$descricao,'slug'=>$slug,'link_face'=>$link_face,'link_inst'=>$link_inst,
						'link_yutube'=>$link_yutube,'foto'=>$imagem, 'ativo'=>$ativo, 'id'=>$id,'nome_tabela'=>'tb_site.equipe'];
					Painel::update($arr);
					$slide = Painel::select('tb_site.equipe','id = ?',array($id));
					Painel::alert('sucesso','O Slide foi editado com sucesso!');
				}

			}
		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" required value="<?php echo $slide['nome']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Titulo do slide:</label>
			<input type="text" name="titulo" required value="<?php echo $slide['titulo']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Slug social:</label>
			<input type="text" name="slug" required value="<?php echo $slide['slug']; ?>">
		</div><!--form-group-->
 
 		<div class="form-group">
			<label>Link Facebook:</label>
			<input type="text" name="link_face" required value="<?php echo $slide['link_face']; ?>">
		</div><!--form-group-->
		
		<div class="form-group">
			<label>Link Instagran:</label>
			<input type="text" name="link_inst" required value="<?php echo $slide['link_inst']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Link Youtube:</label>
			<input type="text" name="link_yutube" required value="<?php echo $slide['link_yutube']; ?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Conteúdo:</label>
			<textarea class="tinymce" name="descricao"><?php echo $slide['descricao']; ?></textarea>
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
			<input type="hidden" name="imagem_atual" value="<?php echo $slide['foto']; ?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Ativo:</label>
			<select name="ativo">
				<option value="1">Sim</option>
				<option value="0">Não</option>
			</select>
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->