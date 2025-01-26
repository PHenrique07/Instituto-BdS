<?php 
// nome do arquivo é lista-clientes.php
include ("../PAL/conexao-bds.php");
include ("../PAL/banco-bds.php");
?>
<html>
<head>
    <title>Lista de Logins Empresas</title>
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
            <td>CNPJ</td>
            <td>Excluir</td>
            <td>Alterar</td>
        </tr> <!--Fechamento do TR-->
        <?php
            $clientesE = listarE($conexao);
            foreach($clientesE as $clienteE):
        ?>
        <tr><!--Montando a tabela com conteúdo vindo do banco de dados-->
            <td><?php echo $clienteE['idLoginE']?></td>
            <td><?php echo $clienteE['nome']?></td>
            <td><?php echo $clienteE['username']?></td>
            <td><?php echo $clienteE['email']?></td>
            <td><?php echo $clienteE['telefone']?></td>
            <td><?php echo $clienteE['senha']?></td>
            <td><?php echo $clienteE['cnpj']?></td>
            <td><a href="excluir-logine.php?idLoginE=<?php echo $clienteE['idLoginE']?>">Excluir</a></td>
            <td><a href="alterar-logine.php?idLoginE=<?php echo $clienteE['idLoginE']?>">Alterar</a></td>
        </tr>
        <?php 
            endforeach; // fim da estrutura de repetição
        ?>
    </table>
</body>
</html>
