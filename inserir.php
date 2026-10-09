<?php
    $Nome = $_POST['Nome'];
    $Telefone = $_POST['Telefone'];
    $Email = $_POST['Email'];
    if (! $Nome) {
        echo 'Nome em falta.
        Volte atrás a preencha o nome.'; exit;}
    echo 'dados recebidos: <br/>';
    echo 'Nome: ' . $Nome . '<br/>';
    echo 'Telefone: ' . $Telefone . '<br/>';
    echo 'Email: ' . $Email . '<br/>';

    $conexao = new mysqli('localhost', 'root', '', 'pessoal');
    if ($conexao->connect_error) {
        echo "Falha na conexão: " . $conexao->connect_error;
        exit();
}
    mysqli_select_db($conexao, 'pessoal');

    $insere = "INSERT INTO contacto (Nome, Telefone, Email) VALUES ('$Nome', '$Telefone', '$Email')";
    if ($conexao->query($insere) === TRUE) {
    echo "Inserção realizada com sucesso.";
    } else {
    echo "Erro: " . $insere . "<br>" . $conexao->error;
    }
    $conexao->close();
?>