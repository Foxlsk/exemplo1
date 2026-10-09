<?php

    $Nome = $_POST['Nome'];
    echo 'Nome a procurar: ' . $Nome . '<p>';
$conexao = new mysqli('localhost', 'root', '', 'pessoal');
if ($conexao->connect_error) {
echo 'Falha na conexão: ' . $conexao->connect_error;
exit();
}
mysqli_select_db($conexao, 'pessoal');
    $consulta = "SELECT * FROM contacto WHERE Nome LIKE '%$Nome%'";
    $resultado = mysqli_query($conexao, $consulta);
    $n_registos = mysqli_num_rows($resultado);
    if ($n_registos == 0)
        {
            echo 'Não foram encontrados registos com o nome: ' . $Nome;
        }
    else
        {echo '<h3>Dados deste contacto</h3>';
        $registo = mysqli_fetch_array($resultado);
        echo '<br/>Nome: ' . $registo['Nome'];
        echo '<br/>Telefone: ' . $registo['Telefone'];
        echo '<br/>Email: ' . $registo['Email'] . '<br/>';
        }
    mysqli_close($conexao);
?>
    