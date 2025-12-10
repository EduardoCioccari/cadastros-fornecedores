<?php

$dsn = "mysql:host=localhost;dbname=cadastros";
$usuario = "root";
$senha = "";

// Conexão com objeto PDO.
try {
    $conexao = new PDO($dsn, $usuario, $senha);

    // Ativando exceções para erros no SQL.
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Output de algum erro caso haja.
    echo "Erro de conexão no banco de dados: " . $e->getMessage();
}
