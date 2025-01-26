<?php
include ("conexao-bds.php");

if($conexao) {
	echo "Conexao efetuada";
}else{
	$mensagem = mysqli_errno ($conexao);
	echo $mensagem;
}

?>