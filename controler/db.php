<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "sistema_cursos";

// Criar conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}
?>
