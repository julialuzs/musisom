<?php
require 'conexao.php';

// Recebe o codigo do cliente do cliente via GET
$codigo_produto = (isset($_GET['codigo'])) ? $_GET['codigo'] : '';

// Valida se existe um codigo e se ele é numérico
if (!empty($codigo_produto) && is_numeric($codigo_produto)) :

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = $sql = 'SELECT codigo, tipo, marca, descricao, valor, qtd_estoque FROM produtos WHERE codigo = :codigo';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':codigo', $codigo_produto);
	$stm->execute();
	$produto = $stm->fetch(PDO::FETCH_OBJ);

endif;

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Edição de Produto</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>
	<header>
		<?php require_once('navbar.php'); ?>
	</header>
	<div class='container'>
		<fieldset>
			<legend>
				<h1>Formulário - Edição de Produto</h1>
			</legend>

			<?php if (empty($produto)) : ?>
				<h3 class="text-center text-danger">Produto não encontrado!</h3>
			<?php else : ?>
				<form action="action-produto.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<div class="row">
						<label for="nome">Alterar Foto</label>
						<div class="col-md-2">
							<a href="#" class="thumbnail">
								<img src="fotos/<?= $produto->foto ?>" height="190" width="150" id="foto-cliente">
							</a>
						</div>
						<input type="file" name="foto" id="foto" value="foto">
					</div>

					<div class="form-group">
						<label for="descricao">Descrição</label>
						<input type="text" class="form-control" id="descricao" name="descricao" placeholder="Infome a descrição" value="<?= $produto->descricao ?>">
						<span class='msg-erro msg-descricao'></span>
					</div>

					<div class="form-group">
						<label for="valor">Preço</label>
						<input type="number" class="form-valor" id="valor" name="valor" placeholder="Informe o valor" value="<?= $produto->valor ?>">
						<span class='msg-erro msg-valor'></span>

						<label for="qtd_estoque">Quantidade em estoque</label>
						<input type="number" class="form-qtd_estoque" id="qtd_estoque" name="qtd_estoque" placeholder="Informe a quantidade em estoque" value="<?= $produto->qtd_estoque ?>">
						<span class='msg-erro msg-qtd_estoque'></span>
					</div>

					<div class="form-group horizontal">
						<label for="tipo">Tipo</label>
						<select class="form-control" name="tipo" id="tipo">
							<option value="<?= $produto->tipo ?>"><?= $produto->tipo ?></option>
							<option value="cordofone">Cordofone</option>
							<option value="aerofone">Aerofone</option>
							<option value="idiofone">Idiofone</option>
							<option value="eletrofone">Eletrofone</option>
						</select>
						<span class='msg-erro msg-tipo'></span>

						<label for="marca">Marca</label>
						<select class="form-control" name="marca" id="marca">
							<option value="<?= $produto->marca ?>"><?= $produto->marca ?></option>
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

					<input type="hidden" name="acao" value="editar">
					<input type="hidden" name="codigo" value="<?= $produto->codigo ?>">
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>

</html>