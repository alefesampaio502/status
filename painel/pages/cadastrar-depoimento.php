<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Depoimento</h2>

	<form method="post" enctype="multipart/form-data">

		<?php

			if(isset($_POST['acao'])){
				$nome 		= $_POST['nome'];
				$depoimento 	= $_POST['depoimento'];
				$imagem 	= $_FILES['imagem'];
				$data = $_POST['data'];
				$funcao = $_POST['funcao'];

				//validação de campos
				if($nome == ''){
					Painel::alert('erro','O campo nome não pode ficar vázio!');
				}

              if($depoimento == ''){
					Painel::alert('erro','O campo Depoimento não pode ficar vázio!');
				}
				
				if($data == ''){
					Painel::alert('erro','O campo Data não pode ficar vázio!');
				}
				if($funcao == ''){
					Painel::alert('erro','O campo Função não pode ficar vázio!');
					///Final da validação
				}else{
					//Podemos cadastrar!
					if(Painel::imagemValida($imagem) == false){
						Painel::alert('erro','O formato especificado não está correto!');
					}else{
						//Apenas cadastrar no banco de dados!
						include('../classes/lib/WideImage.php');
						$imagem = Painel::uploadFile($imagem);
						//WideImage::load('uploads/'.$imagem)->resize(100)->rotate(180)->saveToFile('uploads/'.$imagem);
	$arr = ['nome'=>$nome,'depoimento'=>$depoimento,'foto'=>$imagem,'data'=>$data,'funcao'=>$funcao,'order_id'=>'0','nome_tabela'=>'tb_site.depoimentos'];

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
			<label>Depoimento:</label>
			<textarea class="tinymce" name="depoimento"></textarea>
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
		</div><!--form-group-->

        <div class="form-group">
			<label>Data:</label>
			<input type="date" name="data">
		</div><!--form-group-->

		<div class="form-group">
			<label>Funçâo:</label>
			<input type="text" name="funcao">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->