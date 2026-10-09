<?php

echo"<h3>Listar Contactos</h3>";
$conexao = new mysqli('localhost', 'root', '', 'pessoal');
if ($conexao->connect_error) {
    echo "Falha na conexão: " . $conexao->connect_error;
    exit();
}
else {
    mysqli_select_db($conexao,"pessoal");
    $resultado = mysqli_query($conexao, "SELECT * FROM contacto");
    $n_registos = mysqli_num_rows($resultado);
    echo $n_registos. " registos encontrados.<br/>";
    while ($registo = mysqli_fetch_array($resultado)) {
        echo "<br/>Nome: " . $registo['Nome'];
        echo "<br/>Telefone: " . $registo['Telefone'];
        echo "<br/>Email: " . $registo['Email'] . "<br/>";
    }
    mysqli_close($conexao);
}
?>