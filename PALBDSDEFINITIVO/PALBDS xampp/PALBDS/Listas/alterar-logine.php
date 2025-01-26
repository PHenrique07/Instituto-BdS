<?php
//Salvar com o nome alterar-cliente.php
include ("../PAL/conexao.php");
include ("../PAL/banco-bds.php");
$id = $_GET['idLoginE'];
$idLoginE = buscaE($conexao,$id);
?>
<html>
	<head><title>Alterar Empresa</title></head>
	<body>
	<h1>Formulário de alteração de dados do automovel</h1>
	<br><br>
	<form method="post" action="verifica-alterar-logine.php">
	Código:<input type="text" name="txtcod" value="<?php echo $clienteE['idLoginE']?>"><br>
	Nome:<input type="text" name="nome" value="<?php echo $clienteE['nome']?>"><br>
	Username:<input type="text" name="username" value="<?php echo $clienteE['username']?>"><br>
	Email:<input type="text" name="email" value="<?php echo $clienteE['email']?>"><br>
	Telefone:<input type="text" name="tel" value="<?php echo $clienteE['telefone']?>"><br>
	CNPJ:<input type="text" name="cnpj" value="<?php echo $clienteE['cnpj']?>"><br>
	Senha:<input type="text" name="senha" value="<?php echo $clienteE['senha']?>"><br>
	<input type="submit" name="btn" value="Alterar">
	</form>
	</body>
	</html>