<?php

include ("../PAL/conexao-bds.php");
include ("../PAL/banco-bds.php");


$id = $_GET ['idLoginU'];
if(excluirP($conexao,$id)){
	//Comando para redirecionar o cliente para a lista atualizada
	header("Location: lista-loginu.php");
	
	//Comando para encerrar a conexao com o banco de dados;
	die();
}

?>