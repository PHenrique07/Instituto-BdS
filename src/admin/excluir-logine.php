<?php

include ("../pages/conexao-bds.php");
include ("../pages/banco-bds.php");


$id = $_GET ['idLoginE'];
if(excluirE($conexao,$id)){
	//Comando para redirecionar o cliente para a lista atualizada
	header("Location: lista-logine.php");
	
	//Comando para encerrar a conexao com o banco de dados;
	die();
}

?>