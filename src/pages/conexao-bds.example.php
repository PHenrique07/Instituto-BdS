<?php
// Renomeie este arquivo para conexao-bds.php e preencha com suas credenciais
$conexao = mysqli_connect('localhost:3306', 'SEU_USUARIO', 'SUA_SENHA', 'BDS');

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>
