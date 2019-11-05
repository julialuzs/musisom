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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<header>
		<?php
		require_once('navbar.php');
		require_once('background.php');
		?>
	</header>
	<div class='container'>
		<fieldset>
			<legend>
				<span class="form-title">Editar produto</span>
			</legend>

			<?php if (empty($produto)) : ?>
				<h3 class="text-center text-danger">Produto não encontrado!</h3>
			<?php else : ?>
				<form action="action-produto.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<div class="row">
						<div class="thumbnail-area">
							<label for="nome">Alterar Foto</label>
							<a href="#" class="thumbnail">
								<img src="fotos/<?= $produto->foto ?>" id="foto-cliente">
							</a>
						</div>
						<div class="input-file-area">
							<input type="file" name="foto" id="foto" value="foto">
						</div>
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

					<input type="hidden" name="acao" value="editar">
					<input type="hidden" name="codigo" value="<?= $produto->codigo ?>">
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>

</html>