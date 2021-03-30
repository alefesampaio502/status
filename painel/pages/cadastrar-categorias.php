<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Categoria</h2>

	<form method="post" enctype="multipart/form-data">

		<?php

			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
			
				if($nome == ''){
					Painel::alert('erro','O campo nome não pode ficar vázio!');
				}else{
						$slug = Painel::generateSlug($nome);
						$arr = ['nome'=>$nome, 'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site.categorias'];
						Painel::insert($arr);
						Painel::alert('sucesso','O cadastro do slide foi realizado com sucesso!');
					}
				}	
			
		?>

		<div class="form-group">
			<label>Nome do slide:</label>
			<input type="text" name="nome">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>
</div><!--box-content-->