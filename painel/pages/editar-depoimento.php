<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$slide = Painel::select('tb_site.depoimentos','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Depoimento</h2>

	<form method="post" enctype="multipart/form-data">
	
		<?php
			if(isset($_POST['acao'])){
				//Enviei o meu formulário.
				
				$nome = $_POST['nome'];
				$depoimento = $_POST['depoimento'];				
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_POST['imagem_atual'];
				$data = $_POST['data'];
				$funcao = $_POST['funcao'];
				//var_dump($_POST);

				if($imagem['name'] != ''){

					//Existe o upload de imagem.
					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
$arr = ['nome'=>$nome,'depoimento'=>$depoimento,'foto'=>$imagem,'data'=>$data,'funcao'=>$funcao,'id'=>$id,'nome_tabela'=>'tb_site.depoimentos'];

						Painel::update($arr);
						$slide = Painel::select('tb_site.depoimentos','id = ?',array($id));
						Painel::alert('sucesso','O Depoimento foi editado junto com a imagem!');
					}else{
						Painel::alert('erro','O formato da imagem não é válido');
					}
				}else{
					$imagem = $imagem_atual;
					$arr = ['nome'=>$nome,'depoimento'=>$depoimento,'foto'=>$imagem,'data'=>$data,'funcao'=>$funcao,'id'=>$id,'nome_tabela'=>'tb_site.depoimentos'];
					Painel::update($arr);
					$slide = Painel::select('tb_site.depoimentos','id = ?',array($id));
					Painel::alert('sucesso','O Depoimento foi editado com sucesso!');
				}

			}
		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php echo $slide['nome']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Depoimento:</label>
			<textarea class="tinymce" name="depoimento"><?php echo $slide['depoimento']; ?></textarea>
		</div><!--form-group-->


		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
			<input type="hidden" name="imagem_atual" value="<?php echo $slide['foto']; ?>">
		</div><!--form-group-->

        <div class="form-group">
			<label>Data:</label>
			<input type="date" name="data" value="<?php echo $slide['data']; ?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Funçâo:</label>
			<input type="text" name="funcao" value="<?php echo $slide['funcao']; ?>">
		</div><!--form-group-->
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="tb_site.depoimentos" />
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->