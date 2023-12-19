<?php
require_once "../vinculados/funcoes-noticias.php";
require "funcoes-sessao.php";
verificaAcesso();

//PEGANDO O ID DA NOTICA (PELO URL) QUE VAI EXCLUIR
$idNoticia = $_GET['id'];

//PEGANDO ID DO USUARIO (DA SESSION)
$idUsuario =  $_SESSION['id'];

//Executar a função
excluirNoticia($conexao, $idNoticia);

//Redirecionar para noticias.php
header("location:noticias.php");