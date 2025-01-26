<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['idLoginU'])) {
    // Redireciona para a página de login se não estiver logado
    header("Location: Login-usuario.php");
    exit();
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
    <div id="formulario-denuncia">
    <?php

include 'conexao-bds.php';
include 'banco-bds.php';
// Chama a função para obter as empresas
$empresas = listarNomeE($conexao);
?>
        <h2>Avaliação</h2>
    <form action="verificaDenuncia.php" method="post">
        <label for="Nome">Nome</label>
        <input type="text" id="Nome" name="Nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="celular">Celular:</label>
        <input type="tel" id="celular" name="celular" required><br><br>

        <label for="empresa">Qual o nome da empresa?</label>
        <select id="empresa" name="empresa" required>
            <option value="">Selecione a empresa</option>
            <?php
            // Preenche o mini menu com as empresas cadastradas
            foreach ($empresas as $empresa) {
                echo "<option value=\"$empresa\">$empresa</option>";
            }
            ?>
        </select><br><br>

        <label for="registro">Registro Trabalhista</label>
        <input type="text" id="registro" name="registro" required><br><br>

        <label for="cargo">Qual seu cargo?</label>
        <input type="text" id="cargo" name="cargo" required><br><br>

        <label for="historia">Conte sua história:</label>
        <textarea id="historia" name="historia" rows="4" required></textarea><br><br>

        <label for="Nota">Nota:</label>
        <select id="Nota" name="Nota">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>

        <input type="submit" value="Enviar">
    </form>
</div>
</div>

<?php
if ($_POST) {
    $empresa = $_POST['empresa'];
    $historia = $_POST['historia'];
    $celular = $_POST['celular'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];

    if (empty($empresa)) {
        echo "Por favor, insira a empresa que você trabalha(ou).<br>";
    } else {
        echo "Empresa enviada.<br>";
    }

    if (empty($historia)) {
        echo "Por favor, insira um relato na sua denúncia.<br>";
    } else {
        echo "Relato recebido.<br>";
    }
}
?>
</body>
</html>
