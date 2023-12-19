<?php
require "vinculados/cabecalho.php";
require "vinculados/funcoes-noticias.php";


$id = mysqli_real_escape_string ($conexao, $_GET['id']);

$DadosDaNoticias = lerDetalhes($conexao, $id);

?>

<main class="centralizar">

<div class="boxN box container1">

    <article class="col-12">
        <h2> <?= $DadosDaNoticias['titulo'] ?> </h2> 

        <img src="./imagens/<?= $DadosDaNoticias['imagem'] ?>" alt="" class="float-start pe-2 img-fluid">
        
        <p class="ajusta-texto"><?= $DadosDaNoticias['texto'] ?></p>
    </article>
    
</div> 

</main>

<?php 
require_once "vinculados/rodape.php";
?>

