<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Cadastro de Instrumentos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

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
						<img src="imagens/guitarra.png" id="foto-instrumento">
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
					<input type="number" class="form-valor" id="valor" name="valor" placeholder="Informe o valor">
					<span class='msg-erro msg-valor'></span>

					<label for="qtd_estoque">Quantidade em estoque</label>
					<input type="number" class="form-qtd_estoque" id="qtd_estoque" name="qtd_estoque" placeholder="Informe a quantidade em estoque">
					<span class='msg-erro msg-qtd_estoque'></span>
				</div>

				<div class="form-group horizontal">
					<label for="tipo">Tipo</label>
					<select class="form-control" name="tipo" id="tipo">
						<option value="">Selecione o Tipo</option>
						<option value="cordofone">Cordofone</option>
						<option value="aerofone">Aerofone</option>
						<option value="idiofone">Idiofone</option>
						<option value="eletrofone">Eletrofone</option>
					</select>
					<span class='msg-erro msg-tipo'></span>

					<label for="marca">Marca</label>
					<select class="form-control" name="marca" id="marca">
						<option value="">Selecione a Marca(a adicionar)</option>
						<option value="cordofone">Cordofone</option>
						<option value="aerofone">Aerofone</option>
						<option value="idiofone">Idiofone</option>
						<option value="eletrofone">Eletrofone</option>
					</select>
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