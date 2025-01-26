<?php
if (!isset($_SESSION)) {
    session_start();
}

include('conexao-bds.php');
include('banco-bds.php');

if (!isset($_SESSION['cnpj'])) {
    header("Location: Login-PJ.php"); // Redireciona para a página de login se o usuário não estiver logado
    exit();
}

$cnpj = $_SESSION['cnpj']; // Obtém o CNPJ logado a partir da sessão, vai ser utilizado para mostrar apenas o perfil da empresa logada

$empresa = selecionarE($conexao, $cnpj);

if (!$empresa) {
    die("Nenhuma empresa encontrada para o CNPJ fornecido.");
}

// Consulta simples para pegar as denúncias relacionadas ao CNPJ da empresa
$query = "SELECT historia, estrelas FROM Avaliacao 
          WHERE IdEmpresaAvaliacao IN (SELECT idLoginE FROM LoginEmpresa WHERE cnpj = '$cnpj')";
$result = mysqli_query($conexao, $query);

$denuncias = [];
while ($row = mysqli_fetch_assoc($result)) {
    $denuncias[] = $row; // Armazena as denúncias (relato e nota)
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDS - PAL - Empresas</title>
    <link rel="stylesheet" href="css/perfilEmpresa.css">
</head>
<body>
<div id="topo-site">
    <div id="logo-bds">
        <img src="img/logo-bds.png" alt="Logo BDS" width="70px" height="80px">
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
            <a href="logout.php"><b>Deslogar</b></a>
        <?php else: ?>
            <a href="Login-usuario.php"><b>Login</b></a>
        <?php endif; ?>
    </div>
</div>

<div id="perfilEmpresa">
    <h1>Informações da Empresa</h1>
    <div class="empresaCard">
        <div class="empresaHeader">
            <div class="empresaFoto">
                <?php if (!empty($empresa['fotoPerfil'])): ?>
                    <img src="<?php echo $empresa['fotoPerfil']; ?>" alt="Foto de <?php echo $empresa['nome']; ?>">
                <?php else: ?>
                    <img src="img/placeholder.png" alt="Sem foto">
                <?php endif; ?>
            </div>
            <div class="empresaInfo">
                <h2><?php echo $empresa['nome']; ?></h2>
                <p><strong>Username:</strong> <?php echo $empresa['username']; ?></p>
            </div>
        </div>
        <div class="empresaDetails">
            <div class="detailBox">
                <p><strong>Email:</strong> <?php echo $empresa['email']; ?></p>
            </div>
            <div class="detailBox">
                <p><strong>Telefone:</strong> <?php echo $empresa['telefone']; ?></p>
            </div>
            <div class="detailBox">
                <p><strong>CNPJ:</strong> <?php echo $empresa['cnpj']; ?></p>
            </div>
            <div class="detailBox">
                <p><strong>Rede Social:</strong> <?php echo $empresa['redeSocial']; ?></p>
            </div>
        </div>
        <div class="empresaBio">
            <div class="detailBox">
                <p><strong>Bio:</strong> <?php echo $empresa['bioPerfil']; ?></p>
            </div>
        </div>
    </div>
</div>

<!-- Aqui começa a parte das denúncias, mantivemos a mesma estrutura de divs -->
<div id="perfilEmpresa" class="empresaCard">
    <h2>Avaliações Recebidas</h2>
    <div class="empresaDetails">
        <?php if (count($denuncias) > 0): ?>
            <?php foreach ($denuncias as $denuncia): ?>
                <div class="detailBox">
                    <p><strong>Relato:</strong> <?php echo nl2br(htmlspecialchars($denuncia['historia'])); ?></p>
                    <p><strong>Nota:</strong> <?php echo $denuncia['estrelas']; ?> estrelas</p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Não há avaliações para esta empresa ainda.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
