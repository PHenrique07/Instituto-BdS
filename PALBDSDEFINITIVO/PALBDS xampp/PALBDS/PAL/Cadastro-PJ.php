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
		<h2>Cadastro PJ</h2>
		<form action="verificaLogin-PJ.php" method="post" enctype="multipart/form-data"> <!--JEFF pegamos no w3 schools -->

			<script>
				function alertaSucesso() {
			   const nome = document.getElementById("nomeE").value;
			   const username = document.getElementById("usernameE").value;
			   const email = document.getElementById("emailE").value;
			   const telefone = document.getElementById("telefoneE").value;
			   const cpnj = document.getElementById("cnpj	").value;
			   const senha = document.getElementById("senhaE").value;
			   const foto = document.getElementById("fotoPerfil").value;
			   const bio = document.getElementById("bioE").value;
			   const rede = document.getElementById("instaE").value;
			   
			   if(nome && username && email && telefone && senha && cnpj && foto && bio) {
			   alert ("Cadastrado com sucesso!");
			   }else{
			   alert("Por favor, preencha todos os campos!");
			   }
			   }
			</script>
				<label for="nomeE">Nome da Empresa:</label>
				<input type="text" id="nomeE" name="nomeE" placeholder="Digite o nome da empresa" required><br><br>
				
				<label for="usernameE">Username:</label>
				<input type="text" id="usernameE" name="usernameE" placeholder="Digite seu username" required><br><br>
	
				<label for="emailE">Email:</label>
				<input type="emailE" id="emailE" name="emailE" placeholder="Digite seu email" required><br><br>
	
				<label for="telefoneE">Telefone:</label>
				<input type="tel" id="telefoneE" name="telefoneE"  placeholder="Digite seu telefone" required><br><br>
	
				<label for="cnpj">CNPJ:</label>  <!--- ANIMAL NAO MEXE NO CNPJ SEU BURRO (JEFF N É PRA VC <3)-->
				<input type="text" id="cnpj" name="cnpj" placeholder="XX.XXX.XXX/0001-XX" required><br><br>
				
				<label for="senhaE">Senha:</label>
				<input type="password" id="senhaE" name="senhaE" placeholder="Digite sua senha" required><br><br>

				<label for="bioE">Biografia:</label>
				<input type="text" id="bioE" name="bioE" placeholder="Digite sua biografia" required><br><br>

				<label for="instaE">Instagram:</label>
				<input type="text" id="instaE" name="instaE" placeholder="Digite seu @ do Instagram"><br><br>
 

				<input type="submit"  onclick="alertaSucesso()" value="Enviar">
			</form>
		</div>
	</div>
 
</body>
</html>