<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

echo "<h1>Bem-vindo ao painel do sistema de cursos!</h1>";
echo "<a href='logout.php'>Sair</a>";
?>
