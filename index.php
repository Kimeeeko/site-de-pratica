<?php
include 'db.php';

// Consulta para listar os jogos
$query = "SELECT * FROM jogos";
$stmt = $pdo->query($query);
$jogos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Jogos</title>
    <link rel="stylesheet" href="style.css"> <!-- link pro style.css -->
</head>
<body>
    <div class="container">
        <h1>Lista de Jogos</h1>
        <form action="adicionar.php" method="post">
            <input type="text" name="nome_jogo" placeholder="Nome" required>
            <input type="text" name="genero" placeholder="Gênero" required>
            <input type="number" name="ano_lancamento" placeholder="Ano" required>
            <input type="text" name="estudio_editor" placeholder="Estúdio/Editor" required>
            <input type="text" name="plataformas" placeholder="Plataformas" required>
            <button type="submit">Adicionar Jogo</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Gênero</th>
                    <th>Ano</th>
                    <th>Estúdio</th>
                    <th>Plataformas</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jogos as $jogo): ?>
                    <tr>
                        <td><?php echo $jogo['nome_jogo']; ?></td>
                        <td><?php echo $jogo['genero']; ?></td>
                        <td><?php echo $jogo['ano_lancamento']; ?></td>
                        <td><?php echo $jogo['estudio_editor']; ?></td>
                        <td><?php echo $jogo['plataformas']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $jogo['id_jogo']; ?>">Editar</a>
                            <a href="deletar.php?id=<?php echo $jogo['id_jogo']; ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
