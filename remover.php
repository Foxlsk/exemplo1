<?php
$Nome = $_POST['nome'];
if (!$Nome) {
    echo 'Nome em falta.<br>';
    echo 'Volte atrás e preencha o nome.';
    exit;
}
$conexao = new mysqli('localhost', 'root', '', 'pessoal');
if ($conexao->connect_error) {
    echo "Falha na conexão: " . $conexao->connect_error;
    exit();
}
mysqli_select_db($conexao, 'pessoal');
if ($conexao->query("DELETE FROM contacto WHERE Nome = '$Nome'") === TRUE) {
    if ($conexao->affected_rows > 0) {
        echo "Contacto removido com sucesso.";
    } else {
        echo "Não foi encontrado nenhum contacto com o nome: " . $Nome;
    }
} else {
    echo "Erro ao remover o contacto: " . $conexao->error;
}
$conexao->close();
?>