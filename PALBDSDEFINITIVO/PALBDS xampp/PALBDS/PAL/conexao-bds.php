<?php
// Criar a conexão
$conexao = mysqli_connect('localhost:3306', 'root', '', 'BDS'); // Mudar para as informações do servidor quando hospedado

// Verificar a conexão
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}



?>
