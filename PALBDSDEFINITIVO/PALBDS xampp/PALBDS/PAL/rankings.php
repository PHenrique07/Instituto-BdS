<?php
if (!isset($_SESSION)) {
    session_start();
}

include('conexao-bds.php');
include('banco-bds.php');

// Consulta para listar as empresas, calcular a soma das avaliações e contar a quantidade de avaliações
$query = "
    SELECT e.idLoginE, e.nome, e.username, e.email, e.telefone, e.cnpj, e.redeSocial, e.bioPerfil,
           COALESCE(SUM(a.estrelas), 0) AS somaAvaliacoes,
           COUNT(a.IdEmpresaAvaliacao) AS quantidadeAvaliacoes
    FROM LoginEmpresa e
    LEFT JOIN Avaliacao a ON e.idLoginE = a.IdEmpresaAvaliacao
    GROUP BY e.idLoginE
    ORDER BY somaAvaliacoes DESC";

$result = mysqli_query($conexao, $query);

$empresas = [];
while ($row = mysqli_fetch_assoc($result)) {
    $empresas[] = $row;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas - Soma e Total de Avaliações</title>
    <link rel="stylesheet" href="css/estilobds.css">
</head>
<body>
<div id="topo-site">
    <div id="logo-bds">
        <img src="img/logo-bds.png" alt="Logo BDS" width="70px" height="80px">
    </div>
    <div id="menu-site">
        <ul>
            <li><a href="index.php"><b>Início</b></a></li>
            <li><a href="Login-PJ.php"><b>Empresa</b></a></li>
            <li><a href="rankings.php"><b>Rankings</b></a></li>
            <li><a href="Denúncias.php"><b>Avaliação</b></a></li>
            <li><a href="sobre nos.php"><b>Sobre Nós</b></a></li>
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

<div id="empresas">
    <h1>Empresas Ordenadas por Soma e Total de Avaliações</h1>
    <?php if (count($empresas) > 0): ?>
        <div class="empresaLista">
            <?php foreach ($empresas as $empresa): ?>
                <div class="empresaCard">
                    <div class="empresaHeader">
                        <div class="empresaInfo">
                            <h2><?php echo htmlspecialchars($empresa['nome']); ?></h2>
                            <p><strong>Username:</strong> <?php echo htmlspecialchars($empresa['username']); ?></p>
                        </div>
                    </div>
                    <div class="empresaDetails">
                        <div class="detailBox">
                            <p><strong>Email:</strong> <?php echo htmlspecialchars($empresa['email']); ?></p>
                        </div>
                        <div class="detailBox">
                            <p><strong>Telefone:</strong> <?php echo htmlspecialchars($empresa['telefone']); ?></p>
                        </div>
                        <div class="detailBox">
                            <p><strong>CNPJ:</strong> <?php echo htmlspecialchars($empresa['cnpj']); ?></p>
                        </div>
                        <div class="detailBox">
                            <p><strong>Rede Social:</strong> <?php echo htmlspecialchars($empresa['redeSocial']); ?></p>
                        </div>
                        <div class="detailBox">
                            <p><strong>Bio:</strong> <?php echo htmlspecialchars($empresa['bioPerfil']); ?></p>
                        </div>
                    </div>
                    <br>
                    
                    <div class="empresaStats">
                        <div class="detailBox">
                            <p><strong>Soma das Avaliações:</strong> <?php echo $empresa['somaAvaliacoes']; ?></p>
                        </div>
                        <br>
                        <div class="detailBox">
                            <p><strong>Total de Avaliações:</strong> <?php echo $empresa['quantidadeAvaliacoes']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Não há empresas cadastradas.</p>
    <?php endif; ?>
</div>
</body>
</html>
