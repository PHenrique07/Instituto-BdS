<?php
// Ativar mensagens de erro para depuração
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexao-bds.php");
include("banco-bds.php");

$nome = $_POST['nomeE'];
$username = $_POST['usernameE'];
$email = $_POST['emailE'];
$tel = $_POST['telefoneE'];
$senha = $_POST['senhaE']; 
$cnpj = $_POST['cnpj'];

$bio = $_POST['bioE'];
$rede = $_POST['instaE'];


if (inserirE($conexao, $nome, $username, $email, $tel, $senha, $cnpj, $bio, $rede)) {
    echo "Cliente cadastrado com sucesso!";
} else {
    $mensagem = mysqli_error($conexao);
    echo "Erro ao cadastrar: " . $mensagem;
}
?>
