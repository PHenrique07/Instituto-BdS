<?php
// Conexão e funções de banco já estão inclusas no início do arquivo
include 'conexao-bds.php';
include 'banco-bds.php';

if ($_POST) {
    // Recebendo os dados do formulário
    $nome = $_POST['Nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $empresa = $_POST['empresa']; // Nome da empresa, precisamos do ID
    $registro = $_POST['registro'];
    $cargo = $_POST['cargo'];
    $historia = $_POST['historia'];
    $nota = $_POST['Nota'];

    // Primeiro, pegar o ID da empresa baseado no nome
    $sql = "SELECT idLoginE FROM LoginEmpresa WHERE nome = '$empresa'";
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado) {
        $empresaId = mysqli_fetch_assoc($resultado)['idLoginE']; // Pegamos o ID da empresa
    } else {
        echo "Erro ao obter ID da empresa.";
        exit();
    }

    // Agora, insira os dados da avaliação com o ID da empresa
    if (inserirAvUsuario($conexao, $nome, $email, $celular, $empresaId, $registro, $cargo, $historia, $nota)) {
        echo "Avaliação Enviada com Sucesso!";
    } else {
        $mensagem = mysqli_error($conexao);
        echo "Erro ao cadastrar: " . $mensagem;
    }
}
?>
