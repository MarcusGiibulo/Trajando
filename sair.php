<?php
session_start();

// Remove as variáveis de sessão 'email' e 'senha'
unset($_SESSION['email']);
unset($_SESSION['senha']);

// Redireciona para a página home.php após o logout
header("Location: home.php");
?>
