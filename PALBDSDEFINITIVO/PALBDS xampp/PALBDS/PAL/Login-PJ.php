<?php
session_start();

// Verifica se o usuário já está logado
if (isset($_SESSION['idLoginE'])) {
    header("Location: perfilEmpresa.php"); // Redireciona para a página principal
    exit();
}

include('conexao-bds.php');
$logado = isset($_SESSION['idLoginU']);
// Verifica se o usuário já está logado
$logadoEmpresa = isset($_SESSION['idLoginE']); // Verifica se o usuário está logado



// Verifica se o formulário foi enviado e se o campo email e senha estao preenchidos
if (isset($_POST['cnpj']) && isset($_POST['senha'])) { 

    if (strlen($_POST['cnpj']) == 0) { 
        echo "Preencha seu cnpj"; 
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else { 
        $cnpj = $conexao->real_escape_string($_POST['cnpj']);
        $senhaEmpresa = $conexao->real_escape_string($_POST['senha']);

        // Verifica o email e senha no banco de dados
        $sql_code = "SELECT * FROM LoginEmpresa WHERE cnpj = '$cnpj' AND senha = '$senhaEmpresa'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $LoginUsuario = $sql_query->fetch_assoc();

            // Criar variáveis de sessão
            $_SESSION['idLoginE'] = $LoginUsuario['idLoginE'];
            $_SESSION['cnpj'] = $LoginUsuario['cnpj'];
            $_SESSION['senha'] = $LoginUsuario['senha'];

            // Redireciona para a página index.html após o login
            header("Location: perfilEmpresa.php"); //DAVI MUDA AQUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
            exit(); 
        } else {
            echo "Falha ao logar! cnpj ou senha inválidos.";
        }
    }
}

// JEFF PESQUISAMOS ESSE LOGIN ATRAVES DE UM VIDEO, LINK: https://www.youtube.com/watch?v=30Of7BFeGHI E AQUI SO ADAPTAMOS O DO LOGIN-USUARIO
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
            <?php if ($logado): ?>
                <a href="logout.php"><b>Deslogar</b></a>
            <?php else: ?>
                <a href="Login-usuario.php"><b>Login</b></a>
            <?php endif; ?>
        </div>
    </div>
    

    <div id="formulario-container">
    <div id="formulario-contato">
        <h2>Login Empresarial</h2>
        <form action="Login-PJ.php" method="post">
            <label for="cnpj">CNPJ:</label>
            <input type="text" id="cnpj" name="cnpj" placeholder="Digite seu cnpj" required><br><br>

            <label for="Senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required><br><br>

            <input type="submit" value="Enviar">
            <br>
            <li><a href="Cadastro-PJ.php"><b>Caso ainda não tenha conta PJ, crie aqui</b></a></li>
            <br>
        </form>
    </div>
</div>

</body>
</html>