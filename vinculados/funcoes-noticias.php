<?php
require "conecta.php";

/* Usada em noticia-insere.php */
function lerNoticias($conexao){
    
    
        // SQL do admin: pode carregar/ver TUDO de TODOS
        $sql = "SELECT 
                    noticias.id, 
                    noticias.titulo, 
                    noticias.data, 
                    usuarios.nome AS autor
                FROM noticias JOIN usuarios
                ON noticias.usuario_id = usuarios.id
                ORDER BY data DESC";
    
    
    // Executando a consulta e guardando o resultado dela
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // Retornando o resultado convertido em uma matriz/array
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    
} // fim lerNoticias


/* Usada em noticia-insere.php e noticia-atualiza.php */
function upload($arquivo){

    /* Validação Back-End */

    //Lista de formatoss suportados pelo site
    // (precisa ser igual ao que está no HTML)
    $tipoValidos = [
        "image/png", "image/jpeg",
        "image/gif", "image/svg+xml"

    ];

    // Verificando se o tipo de aquivos NÃO é suportado 
    if(!in_array($arquivo['type'], $tipoValidos)){
        echo "<script>
                alert('formato invalido!'); history.back();
            <script>";
            exit;
    }

    // Obtendo apenas o nome/extensão do arquivo
    $nome = $arquivo['name'];

    //Obtendo informações de acesso temporario
    $temporario = $arquivo['tmp_name'];

    //Definindo para onde a imagem vai e com qual nome
    $destino = "/imagens".$nome;

    //Movendo o arquivo da area temporaria para a pasta final
    move_uploaded_file($temporario, $destino);
    
} // fim upload


/* Usada em noticias.php */
function inserirNoticia($conexao, $titulo, $texto, $resumo, $nomeimagem, $usuarioId){
    
    $sql = "INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id
    ) VALUES ('$titulo', '$texto', '$resumo', '$nomeimagem', $usuarioId)";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim inserirNoticia


/* Usada em noticias.php e páginas da área pública */
function formataData($data){    
    $dataFormatada = date("d/m/Y H:i", strtotime($data)); 
    return $dataFormatada;
} // fim formataData


/* Usada em noticia-atualiza.php */
function lerUmaNoticia($conexao, $idNoticia){

    $sql = "SELECT * FROM noticias WHERE id = $idNoticia"; 

    // Executando o comando SQL e guardando o resultado
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // Retornando UM UNICO array com os dados na noticia
    return mysqli_fetch_assoc($resultado);

} // fim lerUmaNoticia


/* Usada em noticia-atualiza.php */
function atualizarNoticia($conexao, $titulo, $texto, $resumo, $imagem, $idNoticia){
    
  $sql = "UPDATE noticias SET titulo = '$titulo', texto = '$texto', resumo = '$resumo', imagem = '$imagem' WHERE id = '$idNoticia'";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim atualizarNoticia


/* Usada em noticia-exclui.php */
function excluirNoticia($conexao, $idNoticia){

    $sql = "DELETE FROM noticias WHERE id = $idNoticia";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim excluirNoticia


/* ******************************************************* */


/* Funções usadas nas páginas da área pública */

/* Usada em index.php */
function lerTodasAsNoticias($conexao){
    $sql = "SELECT titulo, resumo, imagem, id
            FROM noticias ORDER BY data DESC";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);

} // fim lerTodasAsNoticias


/* Usada em noticia.php */
function lerDetalhes($conexao, $id){
    $sql = "SELECT 
                noticias.id, 
                noticias.titulo, 
                noticias.data, 
                noticias.imagem,
                noticias.texto,
                usuarios.nome AS autor
            FROM noticias JOIN usuarios
            ON noticias.usuario_id = usuarios.id
            WHERE noticias.id = $id";

    $resultado = mysqli_query($conexao, $sql) 
                or die(mysqli_error($conexao));

    return mysqli_fetch_assoc($resultado);

} // fim lerDetalhes

