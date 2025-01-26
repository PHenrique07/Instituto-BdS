<?php
//Salvar com o nome verificaalteracao.php
include ("../PAL/conexao.php");
include ("../PAL/banco-bds.php");

//O verificaalteracao funciona de forma parecida com o verificacadastro
//Então vamos pegar os dados que estão vindo do formulário

$id = $_POST['idLoginE'];
$nome = $_POST['nome'];
$username = $_POST['username'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cnpj = $_POST['cnpj'];
$senha = $_POST['senha'];


if(alterarE($conexao, $nome, $username, $email, $tel, $senha, $cnpj, $idLoginE)){
	echo "Automovel alterado";
}else{
	$msg = mysqli_errno($conexao);
	echo $msg;
}
?>