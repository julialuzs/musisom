/* Atribui ao evento submit do formulário a função de validação de dados */
var form = document.getElementById("form-contato");
if (form != null && form.addEventListener) {
	form.addEventListener("submit", validaCadastro);
} else if (form != null && form.attachEvent) {
	form.attachEvent("onsubmit", validaCadastro);
}

/* Atribui ao evento change do input FILE para upload da foto*/
var inputFile = document.getElementById("foto");
var foto_instrumento = document.getElementById("foto-instrumento");
if (inputFile != null && inputFile.addEventListener) {
	inputFile.addEventListener("change", function () { loadFoto(this, foto_instrumento) });
} else if (inputFile != null && inputFile.attachEvent) {
	inputFile.attachEvent("onchange", function () { loadFoto(this, foto_instrumento) });
}

/* Atribui ao evento click do link de exclusão na página de consulta a função confirmaExclusao */
var linkExclusao = document.querySelectorAll(".link_exclusao");
if (linkExclusao != null) {
	for (var i = 0; i < linkExclusao.length; i++) {
		(function (i) {
			var codigo_produto = linkExclusao[i].getAttribute('rel');

			if (linkExclusao[i].addEventListener) {
				linkExclusao[i].addEventListener("click", function () { confirmaExclusao(codigo_produto); });
			} else if (linkExclusao[i].attachEvent) {
				linkExclusao[i].attachEvent("onclick", function () { confirmaExclusao(codigo_produto); });
			}
		})(i);
	}
}

/* Função para validar os dados antes da submissão dos dados */
function validaCadastro(evt) {
	var tipo = document.getElementById('tipo');
	var marca = document.getElementById('marca');
	var descricao = document.getElementById('descricao');
	var valor = document.getElementById('valor');
	var qtd_estoque = document.getElementById('qtd_estoque');
	var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro = 0;


	/* Validação do campo tipo */
	caixa_tipo = document.querySelector('.msg-tipo');
	if (tipo.value == "") {
		caixa_tipo.innerHTML = "Favor preencher o tipo";
		caixa_tipo.style.display = 'block';
		contErro += 1;
	} else {
		caixa_tipo.style.display = 'none';
	}

	/* Validação do campo marca */
	caixa_marca = document.querySelector('.msg-marca');
	if (marca.value == "") {
		caixa_marca.innerHTML = "Favor preencher a Marca";
		caixa_marca.style.display = 'block';
		contErro += 1;
	} else {
		caixa_marca.style.display = 'none';
	}

	/* Validação do campo descricao */
	caixa_descricao = document.querySelector('.msg-descricao');
	if (descricao.value == "") {
		caixa_descricao.innerHTML = "Favor preencher o descricao";
		caixa_descricao.style.display = 'block';
		contErro += 1;
	} else {
		caixa_descricao.style.display = 'none';
	}

	/* Validação do campo qtd_estoque */
	caixa_qtd_estoque = document.querySelector('.msg-qtd_estoque');
	if (qtd_estoque.value == "") {
		caixa_qtd_estoque.innerHTML = "Favor preencher o qtd_estoque";
		caixa_qtd_estoque.style.display = 'block';
		contErro += 1;
	} else {
		caixa_qtd_estoque.style.display = 'none';
	}

	/* Validação do campo valor */
	caixa_valor = document.querySelector('.msg-valor');
	if (valor.value == "") {
		caixa_valor.innerHTML = "Favor preencher o valor";
		caixa_valor.style.display = 'block';
		contErro += 1;
	} else {
		caixa_valor.style.display = 'none';
	}

	if (contErro > 0) {
		evt.preventDefault();
	}
}

/* Função para exibir a imagem selecionada no input file na tag <img>  */
function loadFoto(file, img) {
	if (file.files && file.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			img.src = e.target.result;
		}
		reader.readAsDataURL(file.files[0]);
	}
}

/* Função para exibir um alert confirmando a exclusão do registro*/
function confirmaExclusao(id) {
	debugger
	retorno = confirm("Deseja excluir esse Registro?")

	if (retorno) {

		//Cria um formulário
		var formulario = document.createElement("form");
		formulario.action = "action-produto.php";
		formulario.method = "post";

		// Cria os inputs e adiciona ao formulário
		var inputAcao = document.createElement("input");
		inputAcao.type = "hidden";
		inputAcao.value = "excluir";
		inputAcao.name = "acao";
		formulario.appendChild(inputAcao);

		var inputId = document.createElement("input");
		inputId.type = "hidden";
		inputId.value = id;
		inputId.name = "codigo";
		formulario.appendChild(inputId);

		//Adiciona o formulário ao corpo do documento
		document.body.appendChild(formulario);

		//Envia o formulário
		formulario.submit();
	}
}
