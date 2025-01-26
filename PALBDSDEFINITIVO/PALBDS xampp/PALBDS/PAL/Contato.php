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
            <h2>Contato</h2>
            <form action="/submit_form" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="celular">Celular:</label>
                <input type="tel" id="celular" name="celular" required><br><br>

                <label for="assunto">Assunto:</label>
                <input type="text" id="assunto" name="assunto" required><br><br>

                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="4" required></textarea><br><br>

                <input type="submit" value="Enviar" >
            </form>
        </div>
    </div>
</body>
</html>
