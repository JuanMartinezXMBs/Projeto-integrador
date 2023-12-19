<?php // admin/noticias.php
require_once "../vinculados/funcoes-noticias.php";
require_once "cabecalho-admin.php";

// id do usuário logado
$idUsuario = $_SESSION['id'];


// Chamando a função e passando os parâmetros
$listaDeNoticias = lerNoticias($conexao, $idUsuario);

?>


<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Notícias <span class="badge bg-dark"><?=count($listaDeNoticias)?></span>
		</h2>

		<p class="text-center mt-5">
			<a class="btn btn-primary" href="noticia-insere.php">
			<i class="bi bi-plus-circle"></i>	
			Inserir nova notícia</a>
		</p>
				
		<div class="table-responsive">
		
			<table class="table table-hover">
				<thead class="table-light">
					<tr>
                        <th>Título</th>
                        <th>Data</th>
                        <th>Autor</th>

						<th class="text-center">Operações</th>
					</tr>
				</thead>

				<tbody>

<?php foreach( $listaDeNoticias as $noticia) { ?>
					<tr>
                        <td> <?=$noticia['titulo']?> </td>
                        <td> <?=$noticia['data']?> </td>
                        <td> <?=$noticia['autor']?> </td>

						<td class="text-center">
							<a class="btn btn-warning" 
	href="noticia-atualiza.php?id=<?=$noticia['id']?>">
							<i class="bi bi-pencil"></i> Atualizar
							</a>
						
							<a class="btn btn-danger excluir" 
	href="noticia-exclui.php?id=<?=$noticia['id']?>">
							<i class="bi bi-trash"></i> Excluir
							</a>
						</td>
					</tr>
<?php }?>

				</tbody>                
			</table>
	</div>
		
	</article>
</div>


