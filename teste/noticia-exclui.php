<?php
require_once "../vinculados/funcoes-noticias.php";
require "funcoes-sessao.php";
verificaAcesso();

//PEGANDO O ID DA NOTICA (PELO URL) QUE VAI EXCLUIR
$idNoticia = $_GET['id'];

//PEGANDO TIPO DE USUARIO (DA SESSION)
$tipoUsuario = $_SESSION['tipo'];

//PEGANDO ID DO USUARIO (DA SESSION)
$idUsuario =  $_SESSION['id'];

//Executar a função
excluirNoticia($conexao, $idUsuario, $idNoticia, $tipoUsuario);

//Redirecionar para noticias.php
header("location:noticias.php");