<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_jogo = $_POST['id_jogo'];
    $nome_jogo = $_POST['nome_jogo'];
    $genero = $_POST['genero'];
    $ano_lancamento = $_POST['ano_lancamento'];
    $estudio_editor = $_POST['estudio_editor'];
    $plataformas = $_POST['plataformas'];

    // atualizar jogo no banco de dados
    $query = "UPDATE jogos SET nome_jogo = :nome_jogo, genero = :genero, ano_lancamento = :ano_lancamento, 
              estudio_editor = :estudio_editor, plataformas = :plataformas WHERE id_jogo = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':nome_jogo' => $nome_jogo,
        ':genero' => $genero,
        ':ano_lancamento' => $ano_lancamento,
        ':estudio_editor' => $estudio_editor,
        ':plataformas' => $plataformas,
        ':id' => $id_jogo
    ]);

    header("Location: index.php");
    exit;
}


$id_jogo = $_GET['id'];
$query = "SELECT * FROM jogos WHERE id_jogo = :id";
$stmt = $pdo->prepare($query);
$stmt->execute([':id' => $id_jogo]);
$jogo = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Jogo</title>
</head>
<body>
    <h1>Editar Jogo</h1>
    <form method="POST">
        <input type="hidden" name="id_jogo" value="<?php echo $jogo['id_jogo']; ?>">
        <input type="text" name="nome_jogo" value="<?php echo $jogo['nome_jogo']; ?>" required>
        <input type="text" name="genero" value="<?php echo $jogo['genero']; ?>" required>
        <input type="number" name="ano_lancamento" value="<?php echo $jogo['ano_lancamento']; ?>" required>
        <input type="text" name="estudio_editor" value="<?php echo $jogo['estudio_editor']; ?>" required>
        <input type="text" name="plataformas" value="<?php echo $jogo['plataformas']; ?>" required>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
