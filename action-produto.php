<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Cadastro de Instrumentos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>
	<div class='container box-mensagem-crud'>
		<?php
		require 'conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão
		$acao         = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$codigo       = (isset($_POST['codigo'])) ? $_POST['codigo'] : '';
		$tipo         = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
		$marca        = (isset($_POST['marca'])) ? $_POST['marca'] : '';
		$descricao    = (isset($_POST['descricao'])) ? $_POST['descricao'] : '';
		$valor		  = (isset($_POST['valor'])) ? $_POST['valor'] : '';
		$qtd_estoque  = (isset($_POST['qtd_estoque'])) ? $_POST['qtd_estoque'] : '';

		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $codigo == '') :
			$mensagem .= '<li>ID do registros desconhecido.</li>';
		endif;

		// Se for ação diferente de excluir valida os dados obrigatórios
		if ($acao != 'excluir') :

			if ($marca == '') :
				$mensagem .= '<li>Favor preencher a Marca.</li>';
			endif;

			if ($descricao == '') :
				$mensagem .= '<li>Favor preencher a Descrição.</li>';
			endif;

			if ($tipo == '') :
				$mensagem .= '<li>Favor preencher o Tipo.</li>';
			endif;

			if ($valor == '' || $valor <= 0) :
				$mensagem .= '<li>Favor fornecer um valor numerico.</li>';
			endif;

			if ($qtd_estoque == '') :
				$mensagem .= '<li>Favor fornecer a quantidade em estoque (valor numérico).</li>';
			endif;

			if ($mensagem != '') :
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>" . $mensagem . "</div> ";
				exit;
			endif;

		endif;


		if ($acao == 'incluir') :

			$nome_foto = 'padrao.jpg';
			if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) :

				$extensoes_aceitas = array('bmp', 'png', 'svg', 'jpeg', 'jpg');
				$extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));

				// Validamos se a extensão do arquivo é aceita
				if (array_search($extensao, $extensoes_aceitas) === false) :
					echo "<h1>Extensão Inválida!</h1>";
					exit;
				endif;

				// Verifica se o upload foi enviado via POST   
				if (is_uploaded_file($_FILES['foto']['tmp_name'])) :

					// Verifica se o diretório de destino existe, senão existir cria o diretório  
					if (!file_exists("fotos")) :
						mkdir("fotos");
					endif;

					// Monta o caminho de destino com o nome do arquivo  
					$nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];

					// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
					if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/' . $nome_foto)) :
						echo "Houve um erro ao gravar arquivo na pasta de destino!";
					endif;
				endif;
			endif;

			$sql = 'INSERT INTO produtos (tipo, marca, descricao, valor, qtd_estoque)
							   VALUES(:tipo, :marca, :descricao, :valor, :qtd_estoque)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':tipo', $tipo);
			$stm->bindValue(':marca', $marca);
			$stm->bindValue(':descricao', $descricao);
			$stm->bindValue(':valor', $valor);
			$stm->bindValue(':qtd_estoque', $qtd_estoque);
			$retorno = $stm->execute();

			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;


		// Verifica se foi solicitada a edição de dados
		if ($acao == 'editar') :

			if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) :

				// Verifica se a foto é diferente da padrão, se verdadeiro exclui a foto antiga da pasta
				if ($foto_atual <> 'padrao.jpg') :
					unlink("fotos/" . $foto_atual);
				endif;

				$extensoes_aceitas = array('bmp', 'png', 'svg', 'jpeg', 'jpg');
				$extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));

				// Validamos se a extensão do arquivo é aceita
				if (array_search($extensao, $extensoes_aceitas) === false) :
					echo "<h1>Extensão Inválida!</h1>";
					exit;
				endif;

				// Verifica se o upload foi enviado via POST   
				if (is_uploaded_file($_FILES['foto']['tmp_name'])) :

					// Verifica se o diretório de destino existe, senão existir cria o diretório  
					if (!file_exists("fotos")) :
						mkdir("fotos");
					endif;

					// Monta o caminho de destino com o nome do arquivo  
					$nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];

					// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
					if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/' . $nome_foto)) :
						echo "Houve um erro ao gravar arquivo na pasta de destino!";
					endif;
				endif;
			else :

				$nome_foto = $foto_atual;

			endif;

			$sql = 'UPDATE produtos SET tipo=:tipo, marca=:marca, descricao=:descricao, valor=:valor, qtd_estoque=:qtd_estoque ';
			$sql .= 'WHERE codigo = :codigo';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':tipo', $tipo);
			$stm->bindValue(':marca', $marca);
			$stm->bindValue(':descricao', $descricao);
			$stm->bindValue(':valor', $valor);
			$stm->bindValue(':qtd_estoque', $qtd_estoque);
			$stm->bindValue(':codigo', $codigo);
			$retorno = $stm->execute();

			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;

		// Verifica se foi solicitada a exclusão dos dados
		if ($acao == 'excluir') :

			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM produtos WHERE codigo = :codigo';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':codigo', $codigo);
			$retorno = $stm->execute();

			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
		?>

	</div>
</body>

</html>