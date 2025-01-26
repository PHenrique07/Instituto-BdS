<?php
//PESSOA FISICA
function inserirP($conexao, $nome, $username, $email, $tel, $senha, $cpf) {
    $sql = "INSERT INTO `LoginUsuário` (nome, username, email, telefone, senha, cpf) VALUES ('$nome', '$username', '$email', '$tel', '$senha', '$cpf')";
    return mysqli_query($conexao, $sql);
}

function efetuarloginP ($conexao, $username, $senha) {
	$sql = "select * from 'LoginUsuário' where username='{$username}'"
		."and senha='{$senha}'";
	$resultado= mysqli_query ($conexao, $sql);
	return mysqli_fetch_assoc ($resultado);
}
		
function alterarP($conexao, $nome, $username, $email, $tel, $senha, $cpf, $idLoginU) {
    $sql = "UPDATE `LoginUsuário` SET nome = '$nome', username = '$username', email = '$email', telefone = '$tel', senha = '$senha', cpf = '$cpf' WHERE idLoginU = $idLoginU";
    return mysqli_query($conexao, $sql);
}

function excluirP($conexao, $idLoginU) {
    $sql = "DELETE FROM `LoginUsuário` WHERE idLoginU = $idLoginU";
    return mysqli_query($conexao, $sql);
}

function listarP($conexao) {
    $clientes = array();
    $sql = "SELECT * FROM `LoginUsuário`";
    $resultado = mysqli_query($conexao, $sql);
    while ($cliente = mysqli_fetch_assoc($resultado)) {
        array_push($clientes, $cliente);
    }
    return $clientes;
}

function buscaP($conexao, $idLoginU) {
    $sql = "SELECT * FROM `LoginUsuário` WHERE idLoginU = $idLoginU";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}
//EMPRESAS:
function inserirE($conexao, $nome, $username, $email, $tel, $senha, $cnpj, $bio, $rede) {
    $sql = "INSERT INTO `LoginEmpresa` (nome, username, email, telefone, senha, cnpj, bioPerfil, redeSocial) VALUES ('$nome', '$username', '$email', '$tel', '$senha', '$cnpj', '$bio', '$rede')";
    return mysqli_query($conexao, $sql);
}

function excluirE($conexao, $idLoginE) {
    $sql = "DELETE FROM `LoginEmpresa` WHERE idLoginE = $idLoginE";
    return mysqli_query($conexao, $sql);
}


function alterarE($conexao, $nome, $username, $email, $tel, $senha, $cnpj, $bio, $rede, $idLoginE) {
    $sql = "UPDATE `LoginEmpresa` SET nome = '$nome', username = '$username', email = '$email', telefone = '$tel', senha = '$senha', cnpj = '$cnpj', bioPerfil = '$bio', redeSocial = '$rede' WHERE idLoginE = $idLoginE";
    return mysqli_query($conexao, $sql);
}

function listarE($conexao) {
    $clientesE = array();
    $sql = "SELECT * FROM `LoginEmpresa`";
    $resultado = mysqli_query($conexao, $sql);
    while ($clienteE = mysqli_fetch_assoc($resultado)) {
        array_push($clientesE, $clienteE);
    }
    return $clientesE;
}

function buscaE($conexao, $idLoginE) {
    $sql = "SELECT * FROM `LoginEmpresa` WHERE idLoginE = $idLoginE";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}

function listarNomeE($conexao) {
    $empresas = array();
    $sql = "SELECT nome FROM `LoginEmpresa`"; 
    $resultado = mysqli_query($conexao, $sql);
    while ($empresa = mysqli_fetch_assoc($resultado)) {
        $empresas[] = $empresa['nome'];
    } return $empresas;
}

function selecionarE($conexao, $cnpj) {
    $sql = "SELECT * FROM LoginEmpresa WHERE cnpj = '$cnpj'";
    $result = $conexao->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc(); // Retorna os dados da empresa como um array
    } else {
        return null; // Retorna null se nenhum resultado for encontrado
    }
}

//Avaliações
function inserirA($conexao, $nome, $username, $email, $tel, $senha, $cnpj, $bio, $rede) {
    $sql = "INSERT INTO `LoginEmpresa` (nome, username, email, telefone, senha, cnpj, bioPerfil, redeSocial) VALUES ('$nome', '$username', '$email', '$tel', '$senha', '$cnpj', '$bio', '$rede')";
    return mysqli_query($conexao, $sql);
}

function inserirAvUsuario($conexao, $nome, $email, $celular, $empresaId, $registro, $cargo, $historia, $nota) {
    $sql = "INSERT INTO Avaliacao (nome, email, celular, IdEmpresaAvaliacao, registroTrabalhista, cargo, historia, estrelas) 
            VALUES ('$nome', '$email', '$celular', '$empresaId', '$registro', '$cargo', '$historia', '$nota')";
    return mysqli_query($conexao, $sql);
}









?>
