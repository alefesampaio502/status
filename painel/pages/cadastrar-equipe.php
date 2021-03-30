<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Equipe</h2>

	<form method="post" enctype="multipart/form-data">

		<?php

		if(isset($_POST['acao'])){
			$nome 		= $_POST['nome'];
			$titulo 	= $_POST['titulo'];
			$descricao 	= $_POST['descricao'];
			$slug 		= $_POST['slug'];
			$link_face 	= $_POST['link_face'];
			$link_inst 	= $_POST['link_inst'];
			$link_yutube = $_POST['link_yutube'];
			$ativo = $_POST['ativo'];
			$imagem 	= $_FILES['imagem'];
			if($nome == ''){
				Painel::alert('erro','O campo nome não pode ficar vázio!');
			}else{
					//Podemos cadastrar!
				if(Painel::imagemValida($imagem) == false){
					Painel::alert('erro','O formato especificado não está correto!');
				}else{
						//Apenas cadastrar no banco de dados!
					include('../classes/lib/WideImage.php');
					$imagem = Painel::uploadFile($imagem);
						//WideImage::load('uploads/'.$imagem)->resize(100)->rotate(180)->saveToFile('uploads/'.$imagem);
					$arr = ['nome'=>$nome,'titulo'=>$titulo,'descricao'=>$descricao,'slug'=>$slug,
					'link_face'=>$link_face,'link_inst'=>$link_inst,
					'link_yutube'=>$link_yutube,'
					foto'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site.equipe'];
					Painel::insert($arr);
					Painel::alert('sucesso','O cadastro do Equipe foi realizado com sucesso!');
					}
				}

			}
		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->
		<div class="form-group">
			<label>Função na Equipe:</label>
			<input type="text" name="titulo">
		</div><!--form-group-->
		<div class="form-group">
			<label>Slug social:</label>
			<input type="text" name="slug"/>
		</div><!--form-group-->		
		<div class="form-group">
			<label>Link Facebook:</label>
			<input type="text" name="link_face"/>
		</div><!--form-group-->		
		<div class="form-group">
			<label>Link Instagran:</label>
			<input type="text" name="link_inst"/>
		</div><!--form-group-->
		<div class="form-group">
			<label>Link Youtube:</label>
			<input type="text" name="link_yutube"/>
		</div><!--form-group-->
		<div class="form-group">
			<label>Resumo do membro:</label>
			<textarea class="tinymce" name="descricao"></textarea>
		</div><!--form-group-->
		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
		</div><!--form-group-->
		<div class="form-group">
			<label>Ativo:</label>
			<select name="ativo">
				<option value="1">Sim</option>
				<option value="0">Não</option>
			</select>
		</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->