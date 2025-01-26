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

    <br>

    <div id="area-texto1">
        <div id="texto1">
            <p><b>O instituto BDS resolve o seu problema</b></p>
        </div>
    </div>

    <div id="area-texto1">
        <div id="texto2">
            <p><b>O Instituto BDS é líder no campo de gestão de reclamações de funcionários, oferecendo soluções eficazes para lidar com questões laborais de forma justa e transparente. Com uma abordagem centrada no bem-estar dos colaboradores e na melhoria do ambiente de trabalho, nós disponibilizamos um ambiente para as empresas resolverem conflitos internos de maneira eficiente e respeitosa. Utilizando técnicas de mediação e investigação cuidadosa, ajudamos nossos clientes a identificar e abordar preocupações dos funcionários de forma proativa, promovendo uma cultura organizacional saudável e produtiva.</b></p>
        </div>
    </div>

    <div id="blocos">
        <div id="bloco1">
            <div id="texto01">
                <br>
                <p><h2>Pedro Santos</h2></p>
                <p>5.0 Avaliação</p>
                <p>"Estou muito satisfeito com a empresa! O atendimento foi excelente, desde o primeiro contato até a conclusão do serviço. A equipe mostrou-se extremamente profissional e competente, superando minhas expectativas. Recomendo sem hesitar!"</p>
                <br>
            </div>
        </div>
        <div id="bloco2">
            <div id="texto02">
                <br>
                <p><h2>Davi</h2></p>
                <p>4.0 Avaliação</p>
                <p>Minha experiência com a empresa foi mista. Por um lado, o produto que adquiri atendeu parcialmente às minhas expectativas iniciais. A qualidade era decente, mas havia alguns pequenos problemas de funcionamento que me deixaram um pouco frustrado. Além disso, o processo de entrega demorou mais do que o esperado</p>
                <br>
            </div>
        </div>
        <div id="bloco3">
            <div id="texto03">
                <br>
                <p><h2>Bradd Pitt</h2></p>
                <p>5.0 Avaliação</p>
                <p>Estou extremamente satisfeito com a minha experiência com esta empresa. Desde o momento em que entrei em contato pela primeira vez até a conclusão do serviço, fui tratado com profissionalismo e cortesia em todos os aspectos.</p>
                <br>
            </div>
        </div>
    </div>

</body>

</html>
