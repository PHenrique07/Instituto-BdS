<?php
if (!isset($_SESSION)) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
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
 
    <div id="sobre-nos">
<h1>Sobre Nós</h1>
<!-- Imagem centralizada e ajustada -->
<p>
<img src="img/Sobre Nós Buzao.png" alt="Sobre Nós Buzao">
</p>
<p>
            Bem-vindo ao BDS - PAL, o site onde você, como funcionário, pode fazer avaliações do seu empregador.
            Nosso objetivo é fornecer uma plataforma transparente e confiável para que os trabalhadores possam compartilhar
            suas experiências e ajudar outros a tomar decisões informadas sobre suas carreiras.
</p>
<p>
            No BDS - PAL, compilamos rankings das melhores e piores empresas para se trabalhar, baseados nas avaliações
            dos próprios funcionários. Acreditamos que, ao destacar as empresas que tratam bem seus funcionários e expor
            aquelas que não o fazem, podemos promover um ambiente de trabalho mais justo e saudável para todos.
</p>
<p>
            Nossa missão é dar voz aos trabalhadores e ajudar a melhorar as condições de trabalho em todo o país. Junte-se
            a nós e compartilhe sua experiência!
</p>
<h2>Nossos Valores</h2>
<p>
            - Transparência: Valorizamos a honestidade e a abertura em todas as nossas interações.
<br>
            - Integridade: Mantemos os mais altos padrões éticos em tudo o que fazemos.
<br>
            - Comunidade: Acreditamos no poder da comunidade para promover mudanças positivas.
</p>
<h2>DREAM TEAM</h2>
<p>
            Nossa equipe é composta por profissionais dedicados que acreditam na importância de um ambiente de trabalho justo e equitativo.
            Trabalhamos juntos para fornecer uma plataforma onde todos os trabalhadores possam ser ouvidos.
</p>
<h2>Contato</h2>
<p>
            Se você tiver alguma dúvida ou quiser saber mais sobre nós, não hesite em <a href="contato.html">entrar em contato</a>.
</p>
</div>
</body>
</html>