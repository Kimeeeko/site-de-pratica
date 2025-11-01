<?php
include 'db.php';

$id_jogo = $_GET['id'];


$query = "DELETE FROM jogos WHERE id_jogo = :id";
$stmt = $pdo->prepare($query);
$stmt->execute([':id' => $id_jogo]);

header("Location: index.php");
exit;
?>
