<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Cadastro de Instrumentos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body>
	<header>
		<?php require_once('navbar.php'); ?>
	</header>
	<div class='container'>

		<fieldset>

			<form action="action-produto.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
					<label for="nome">Selecionar Foto</label>
					<div class="col-md-2">
						<img src="imagens/guitarra.png" height="190" width="200" id="foto-instrumento">

					</div>
					<input type="file" name="foto" id="foto" value="foto">
				</div>

				<div class="form-group">
					<label for="descricao">Descrição</label>
					<input type="text" class="form-control" id="descricao" name="descricao" placeholder="Infome a descrição">
					<span class='msg-erro msg-descricao'></span>
				</div>

				<div class="form-group">
					<label for="valor">Preço</label>
					<input type="text" class="form-control" id="valor" name="valor" placeholder="Informe o valor">
					<span class='msg-erro msg-valor'></span>
				</div>

				<div class="form-group">
					<label for="qtd_estoque">Quantidade em estoque</label>
					<input type="text" class="form-control" id="qtd_estoque" name="qtd_estoque" placeholder="Informe a quantidade em estoque">
					<span class='msg-erro msg-qtd_estoque'></span>
				</div>

				<div class="form-group">
					<label for="tipo">Tipo</label>
					<input type="text" class="form-control" id="tipo" name="tipo" placeholder="Informe o tipo">
					<span class='msg-erro msg-tipo'></span>
				</div>

				<div class="form-group">
					<label for="marca">Marca</label>
					<input type="text" class="form-control" id="marca" name="marca" placeholder="Informe a marca">
					<span class='msg-erro msg-marca'></span>
				</div>

				<div class="form-group button-section">
					<input type="hidden" name="acao" value="incluir">
					<button type="submit" class="btn btn-primary" id='botao'>
						Gravar
					</button>
					<a href='index.php' class="btn btn-danger">Cancelar</a>
				</div>
			</form>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>

</html>