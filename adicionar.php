<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_jogo = $_POST['nome_jogo'];
    $genero = $_POST['genero'];
    $ano_lancamento = $_POST['ano_lancamento'];
    $estudio_editor = $_POST['estudio_editor'];
    $plataformas = $_POST['plataformas'];

   
    $query = "INSERT INTO jogos (nome_jogo, genero, ano_lancamento, estudio_editor, plataformas) 
              VALUES (:nome_jogo, :genero, :ano_lancamento, :estudio_editor, :plataformas)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':nome_jogo' => $nome_jogo,
        ':genero' => $genero,
        ':ano_lancamento' => $ano_lancamento,
        ':estudio_editor' => $estudio_editor,
        ':plataformas' => $plataformas
    ]);

    header("Location: index.php"); 
    exit;
}
?>
