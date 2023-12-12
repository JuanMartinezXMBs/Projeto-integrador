<?php
<<<<<<< HEAD
require "";
require "";
require "";


if(isset ($_GET['acesso_negado'])) {
	$mensagem = "Você deve logar primeiro !";

} elseif (isset($_GET['dados_incorretos'])){
	$mensagem = "Dados Incorretos, verfique!";

} elseif (isset($_GET['saiu'])){
	$mensagem = "Você saiu do sistema!";

} elseif (isset($_GET['campos_obrigatorios'])){
	$mensagem = "Preencha e-mail e senha!";
}

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
} 
?>

<div class="row">
	<div class="bg-white rounded shadow col-12 my-1 py-4">
		<h2 class="text-center fw-light">Acesso à área administrativa</h2>

		<form action="" method="post" id="form-login" name="form-login" class="mx-auto w-50" autocomplete="off">

		<?php if (isset($mensagem)){ ?>
			<p class="my-2 alert alert-warning text-center">
				<?=$mensagem?>
			</p>
			<?php }?>

			<div class="mb-3">
				<label for="email" class="form-label">E-mail:</label>
				
				<input required class="form-control" type="email" id="email" name="email">
			</div>
			<div class="mb-3">
				<label for="senha" class="form-label">Senha:</label>
				<input required class="form-control" type="password" id="senha" name="senha">
			</div>

			<button class="btn btn-primary btn-lg" name="entrar" type="submit">Entrar</button>

		</form>

	</div>


</div>

<?php
require_once "";
?>
=======
require "vinculados/cabecalho.php";
?>
    <main>
    <div>

    <h2>lOGIN</h2>

    </div>
</main>

<?php 
require_once "vinculados/rodape.php";
?>
>>>>>>> 605806c196730a7caa846a3be15221c38b2e6578
