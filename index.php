<?php
require "vinculados/cabecalho.php";
require "vinculados/funcoes-noticias.php";

$listaDeNoticias = lerTodasAsNoticias ($conexao); 
?>
<main>
    <div class="centralizar ">

        <div class="box">
            <figure>
                <img src="imagens/imagem_05_jesus.jpg" alt="">
            </figure>
        </div>

        <div class="centralizar box horarios">
            <h2>
                Campus - Jd. Eliane SP
            </h2>
            <br>
            <p>
                Sábado: 17h | Domingo: 9h30 - 11h30 - 16h30 -
                18h30 e 20h30 | Segunda: 20h30
            </p>
        </div>
  
<div>
    
<?php foreach($listaDeNoticias as $noticia){ ?>
		<div class="box boxN teste">
            <article class="card shadow-sm h-100">
                <a href="noticia.php?id=<?=$noticia['id']?>" class="card-link">
                    <img src="./imagens/<?=$noticia ['imagem']?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h3 class="fs-4 card-title"><?=$noticia ['titulo']?></h3>
                        <p class="card-text"><?=$noticia ['resumo']?></p>
                    </div>
                </a>
            </article>
		</div>
<?php }?>

</div>


</div>

<div class="box1 "></div> <!-- espaço vazio -->

</div>
</main>

<?php
require_once "vinculados/rodape.php";
?>