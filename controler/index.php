<?php
session_start();
require 'db.php';

// Processar login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar credenciais
    $stmt = $conexao->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hash_senha);
        $stmt->fetch();

        // Verificar senha
        if (password_verify($senha, $hash_senha)) {
            $_SESSION['usuario_id'] = $id;
            header("Location: dashboard.php");
            exit();
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "Usuário não encontrado!";
    }
}
?>