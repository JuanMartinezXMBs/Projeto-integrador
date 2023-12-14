<?php
require "vinculados/cabecalho.php";
require "vinculados/funcoes-usuarios.php";
require "vinculados/funcoes-sessao.php";

if (isset($_POST['entrar'])) {

	if (empty($_POST['email']) || empty($_POST['senha'])) {
		header("location:login.php?campos_obrigatorias");
		exit;


	}

	$email = mysqli_real_escape_string($conexao, $_POST['email']);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

	$usuario = buscaUsuario($conexao, $email);

	if ($usuario != null && password_verify($senha, $usuario['senha'])) {

		
		login($usuario['id'], $usuario['nome'], $usuario['tipo']);

	
		header("location:admin/index.php");

		exit; 


	} else {
		
		header("location:login.php?dados_incorretos");
		exit; 
	}

} /// final do hífen botão

    

	


?>

    <main>
    <div class="centralizar login conteudo">

    <h2>lOGIN</h2>

    <div >
    <form action="" method="post" id="form-login" name="form-login" class="mx-auto w-50" autocomplete="off">

				<div class="mb-3">
					<label for="email" class="form-label">E-mail:</label>
					<input class="form-control" type="email" id="email" name="email">
				</div>
				<div class="mb-3">
					<label for="senha" class="form-label">Senha:</label>
					<input class="form-control" type="password" id="senha" name="senha">
				</div>

				<button class="botao btn btn-primary btn-lg" name="entrar" type="submit">Entrar</button>

			</form>

    </div>

	<div class="box1 "></div> <!-- espaço vazio -->
</main>

<?php 
require_once "vinculados/rodape.php";
?>
