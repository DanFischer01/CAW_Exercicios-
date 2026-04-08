<?php
$pdo = new PDO("mysql:host=localhost;dbname=escola", "root", "");
$id = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM alunos WHERE id = :id");
$sql->bindValue(':id', $id);
$sql->execute();
$aluno = $sql->fetch(PDO::FETCH_ASSOC);

if (!$aluno) {
    die("Aluno não encontrado!");
}
?>

<form action="atualizar.php" method="POST">
    <input type="hidden" name="id" value="<?= $aluno['id']; ?>">

    <label>Nome:</label>
    <input type="text" name="nome" value="<?= $aluno['nome']; ?>"><br>

    <label>E-mail:</label>
    <input type="email" name="email" value="<?= $aluno['email']; ?>"><br>

    <button type="submit">Salvar Alterações</button>
</form>
