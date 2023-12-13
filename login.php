<?php
require "vinculados/cabecalho.php";
?>
    <main>
    <div>

    <h2>lOGIN</h2>

    <div >
    <form action="" method="post" id="form-login" name="form-login" class="mx-auto w-50" autocomplete="off">

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
</main>

<?php 
require_once "vinculados/rodape.php";
?>
