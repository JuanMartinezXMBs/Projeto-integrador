<?php
/* Sessão mo PHP
Recursos usado para o controle de acesso a determminadas páfinas e/ou resursos do site.

Exemplos: área administrativas, painel de controle, área de cliente/aluno etc...

Nestas áreas o acesso só é possivel mediante a alguma forma de autenticação. Exemplos: login/senha, difital facial etc... 

*/

/* Verificar se já NÃO EXISTE uma sessão em funcionamneto */

if(!isset($_SESSION)) {
    // Então inicie uma sessão
    session_start();
}

function verificaAcesso(){
    // Se NÃO EXISTE uma variavel de sessão chamada "id" baseada no id de um usuario logado, então significa que ele/ela NÃO ESTÁ LOGADO(A) no sistema
        if(!isset($_SESSION['id'])){
        /* Portanto, destrua os dados de sessão, redirecione para a pagina login.php e pare o script. */
        session_destroy();
        header("location:../login.php?acesso_negado");
        exit; //ou die()
    }
}

function login($id, $nome, $tipo){
    /* Criação variaveis de sessão
    Recursos que ficam disponiveis para o uso durante toda a duração da sessão, ou seja, enquanto o navegador não for fechado ou o usuario não clicar em sair. */
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] = $tipo;
}

function logout(){
    session_destroy();
    header("location:../login.php?saiu");
    exit; //ou die()
}

/* Esta verificação será aplicada em TODAS AS PÁGINAS
relacionadas ao gerenciamento de usuários da área
administrativa. */
function verificaTipo(){
    /* Se o tipo de usuário logado
    na sessão NÃO FOR admin */
    if( $_SESSION['tipo'] != 'admin' ){
        // Então redirecione para:
        header("location:nao-autorizado.php");
        exit;
    }
}