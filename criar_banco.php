<?php

$host = 'localhost';
$user = 'root'; 
$password = '';  
$dbName = 'jogosdb'; 

try {
    
    $pdo = new PDO("mysql:host=$host", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $dbName";
    $pdo->exec($createDatabaseQuery);
    echo "Banco de dados '$dbName' criado com sucesso!<br>";

    
    $pdo->exec("USE $dbName");

    
    $createTableQuery = "
        CREATE TABLE IF NOT EXISTS jogos (
            id_jogo INT AUTO_INCREMENT PRIMARY KEY,
            nome_jogo VARCHAR(255) NOT NULL,
            genero VARCHAR(100),
            ano_lancamento INT,
            estudio_editor VARCHAR(255),
            plataformas VARCHAR(255)
        )
    ";
    $pdo->exec($createTableQuery);
    echo "Tabela 'jogos' criada com sucesso!<br>";

} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
?>
