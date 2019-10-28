
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Instrumentos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
<body>
	<div class='container'>
		<fieldset>
			
			<form action="action_cliente.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
					<label for="nome">Selecionar Foto</label>
			      	<div class="col-md-2">
			 
					<img src="imagens/guitarra.png" id="foto-cliente">

				  	</div>
				  	<input type="file" name="foto" id="foto" value="foto" >
			  	</div>

			    <div class="form-group">
			      <label for="descricao">Descrição</label>
			      <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Infome a descrição">
			      <span class='msg-erro msg-descricao'></span>
			    </div>

			    <div class="form-group">
			      <label for="valor">Preço</label>
			      <input type="valor" class="form-valor" id="valor" maxlength="12" name="valor" placeholder="Informe o valor">
			      <span class='msg-erro msg-valor'></span>
			    </div>
			  
			    <div class="form-group">
			      <label for="tipo">Tipo</label>
			      <select class="form-control" name="tipo" id="tipo">
				    <option value="">Selecione o Tipo</option>
				    <option value="cordofone">Cordofone</option>
                    <option value="aerofone">Aerofone</option>
                    <option value="idiofone">Idiofone</option>
                    <option value="eletrofone">Eletrofone</option>
				  </select>
				  <span class='msg-erro msg-tipo'></span>
			    </div>

			    <input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
			    </button>
			    <a href='index.php' class="btn btn-danger">Cancelar</a>
			</form>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>