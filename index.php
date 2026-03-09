<?php
$msg = "";

// Simulando uma lista de disciplinas que viria do seu outro arquivo
$disciplinas_disponiveis = ["Matemática", "Português", "História", "Geografia", "Física"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeAluno = $_POST["nome_aluno"];
    // O PHP recebe múltiplos checkboxes como um Array
    $disciplinasSelecionadas = isset($_POST["disciplinas"]) ? $_POST["disciplinas"] : [];

    if (!empty($nomeAluno) && !empty($disciplinasSelecionadas)) {
        // Transforma o array de disciplinas em uma string separada por vírgula
        $txtDisciplinas = implode(", ", $disciplinasSelecionadas);
        
        $linha = $nomeAluno . ";" . $txtDisciplinas . "\n";

        // Abre o arquivo para adicionar (append)
        $arq = fopen("alunos.txt", "a");
        fwrite($arq, $linha);
        fclose($arq);

        $msg = "Aluno $nomeAluno cadastrado com sucesso!";
    } else {
        $msg = "Erro: Preencha o nome e selecione ao menos uma disciplina.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Alunos</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .campo { margin-bottom: 15px; }
        .sucesso { color: green; font-weight: bold; }
        .erro { color: red; }
    </style>
</head>
<body>

    <h2>Cadastrar Aluno em Disciplinas</h2>

    <form action="incluir_aluno.php" method="POST">
        <div class="campo">
            <label>Nome do Aluno:</label><br>
            <input type="text" name="nome_aluno" required>
        </div>

        <div class="campo">
            <label><strong>Selecione as Disciplinas:</strong></label><br>
            <?php foreach ($disciplinas_disponiveis as $disc): ?>
                <input type="checkbox" name="disciplinas[]" value="<?php echo $disc; ?>"> 
                <?php echo $disc; ?><br>
            <?php endforeach; ?>
        </div>

        <input type="submit" value="Salvar Aluno">
    </form>

    <p class="<?php echo strpos($msg, 'Erro') !== false ? 'erro' : 'sucesso'; ?>">
        <?php echo $msg; ?>
    </p>

    <hr>
    <a href="ex03_IncluirDisciplina.php">Cadastrar Novas Disciplinas</a>

</body>
</html>
