<?php 
require_once "funcoes-usuarios.php";
require_once "cabecalho-admin.php";

// Verificando se o usuário pode entrar nesta página
verificaTipo();

// pegando o valor do parâmetro id vindo da SESSÃO	
$id = $_SESSION['id'];

//Chamando a função e guardando o retorno dela
$usuario = letUmUsuario($conexao, $id);

// Verificando se o formulario foi acionado
if (isset($_POST['atualizar'])){
	//Capturando dados
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$tipo = $_SESSION['tipo']; //Mantendo o tipo

	/* Logica para a Senha
	Se o campo senha estiver vazio ou se a senha for igual a senha que já existe no banco de dados, então deve se manter a senha existente e NÃO ALTERAR a senha do Usuario */
	if (empty($_POST['senha']) || password_verify($_POST['senha'], $usuario['senha'])){ 
		
		$senha = $usuario['senha']; //Mantemos a mesma
	} else {
	/* Casocontrario, pegaremos a nova senha digitada pelo usuario, e vamos codificar ela antes de enviar para o banco */
		$senha = password_verify($_POST['senha'], PASSWORD_DEFAULT);
	}

	//chamando a função e passamos os ados
	atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo);

	// Atualize na sessão atual o nome da pessoa (caso mude)
	$_SESSION["nome"] = $nome;

	//Redirecionamos para a página de usuarios
	header("location:index.php"); // voltar para a pagina index para que o usuario editor não se confunda
}

?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Atualizar meus dados
		</h2>
				
		<form class="mx-auto w-75" action="" method="post" id="form-atualizar" name="form-atualizar">

			<div class="mb-3">
				<label class="form-label" for="nome">Nome:</label>
				<input value="<?=$usuario['nome']?>" class="form-control" type="text" id="nome" name="nome" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="email">E-mail:</label>
				<input value="<?=$usuario['email']?>" class="form-control" type="email" id="email" name="email" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="senha">Senha:</label>
				<input class="form-control" type="password" id="senha" name="senha" placeholder="Preencha apenas se for alterar">
			</div>

			<button class="btn btn-primary" name="atualizar"><i class="bi bi-arrow-clockwise"></i> Atualizar</button>
		</form>
		
	</article>
</div>


<?php 
require_once "rodape.php";
?>

