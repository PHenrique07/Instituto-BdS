<?php
// Ativar mensagens de erro para depuração
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclui os arquivos de conexão e funções do banco
include ("conexao-bds.php");
include ("banco-bds.php");

// Recebendo os dados do formulário
$nome = $_POST['nome'];
$username = $_POST['username'];
$email = $_POST['email'];
$tel = $_POST['telefone'];
$senha = $_POST['senha']; 
$cpf = $_POST['cpf'];

// Tentar inserir os dados
if (inserirP($conexao, $nome, $username, $email, $tel, $senha, $cpf)) {
    echo "Cliente cadastrado com sucesso!";
} else {
    $mensagem = mysqli_error($conexao);
    echo "Erro ao cadastrar: " . $mensagem;
}
?>
