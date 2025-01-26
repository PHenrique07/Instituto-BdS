<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<html>
	<head>
		<title>BDS - PAL - Contato</title>
		<link rel="stylesheet" href="css/estilobds.css">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
 
<body>
<div id="topo-site">
		<div id="logo-bds">
		<img src="img/logo-bds.png" width="70px" height="80px">
		</div>
	<div id="menu-site">
	<ul>
	<ul>
                <li><a href="index.php"><b>Inicio</b></a></li>
                <li><a href="Login-PJ.php"><b>Empresa</b></a></li>
                <li><a href="rankings.php"><b>Rankings</b></a></li>
                <li><a href="Denúncias.php"><b>Avaliação</b></a></li>
                <li><a href="sobre nos.php"><b>Sobre nós</b></a></li>
                <li><a href="Contato.php"><b>Contato</b></a></li>
            </ul>
	</div>
	<div id="cadastro">
            <?php if (isset($_SESSION['idLoginU'])): ?>
                <!-- Se o usuário estiver logado, exibe "Logado" e link para logout -->
                <a href="logout.php"><b>Deslogar</b></a>
            <?php else: ?>
                <!-- Se o usuário não estiver logado, exibe "Login" -->
                <a href="Login-usuario.php"><b>Login</b></a>
            <?php endif; ?>
        </div>
    </div>

 
	<div id="formulario-container">
		<div id="formulario-contato">
			<h2>Cadastro PF</h2>
		
	<form action="verificaLoginUsuario.php" method="post">
		<script>
			function alertaSucesso() {
		   const nome = document.getElementById("nome").value;
		   const username = document.getElementById("username").value;
		   const email = document.getElementById("email").value;
		   const telefone = document.getElementById("telefone").value;
		   const cpf = document.getElementById("cpf").value;
		   const senha = document.getElementById("senha").value;
		   
		   if(nome && username && email && telefone && senha && cpf) {
		   alert ("Cadastrado com sucesso!");
		   }else{
		   alert("Por favor, preencha todos os campos!");
		   }
		   }
		   
		   </script> 
		   

		<label for="Nome">Nome:</label>
		<input type="text" id="nome" name="nome" placeholder="Digite seu nome" required><br><br>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" placeholder="Digite seu username" required><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" placeholder="Digite seu email" required><br><br>
 
        <label for="telefone">Telefone:</label>
		<input type="tel" id="telefone" name="telefone" placeholder="Digite seu telefone" required><br><br>
 
        <label for="cpf">CPF:</label>
		<input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" required><br><br>
		<label for="senha">Senha:</label>
		<input type="password" id="senha" name="senha" placeholder="Digite sua senha" required><br><br>
 
            <input type="submit" onclick="alertaSucesso()" value="Enviar">
	</form>
		</div>
	</div>
 
</body>
</html>
