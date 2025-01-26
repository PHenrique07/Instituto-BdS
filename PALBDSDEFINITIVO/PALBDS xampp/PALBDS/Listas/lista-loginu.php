<?php 
// nome do arquivo é lista-clientes.php
include ("../PAL/conexao-bds.php");
include ("../PAL/banco-bds.php");
?>
<html>
<head>
    <title>Lista de Logins</title>
</head>
<body>
    <h1>Lista de Logins</h1>
    <table border=1>
        <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Username</td>
            <td>Email</td>
            <td>Telefone</td>
            <td>Senha</td>
            <td>Cpf</td>
            <td>Excluir</td>
            <td>Alterar</td>
        </tr> <!--Fechamento do TR-->
        <?php
            $clientes = listarP($conexao);
            foreach($clientes as $cliente):
        ?>
        <tr><!--Montando a tabela com conteúdo vindo do banco de dados-->
            <td><?php echo $cliente['idLoginU']?></td>
            <td><?php echo $cliente['nome']?></td>
            <td><?php echo $cliente['username']?></td>
            <td><?php echo $cliente['email']?></td>
            <td><?php echo $cliente['telefone']?></td>
            <td><?php echo $cliente['senha']?></td>
            <td><?php echo $cliente['cpf']?></td>
            <td><a href="excluir-loginu.php?idLoginU=<?php echo $cliente['idLoginU']?>">Excluir</a></td>
            <td><a href="alterar-loginu.php?idLoginU=<?php echo $cliente['idLoginU']?>">Alterar</a></td>
        </tr>
        <?php 
            endforeach; // fim da estrutura de repetição
        ?>
    </table>
</body>
</html>
