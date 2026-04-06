<?php  

$nomeArq="alunos.txt";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome=$_POST ["nome_aluno"];
    $matricula=$_POST ["matricula"];
    $email=$_POST ["email"];
    if(!file_exists($arq)){
    $arq=fopen($nomeArq, "w") or die("Não foi possivel abrir o arquivo");
    $linha="email; nome; matricula\n";
    fwrite($arq, $linha);
    fclose($arq);
    }
    $arq=fopen($nomeArq, 'a') or die("Não foi possivel abrir o arquivo");
    $linha=$email.";".$nome.";".$matricula."\n";
    fwrite($arq, $linha);
    fclose($arq);


}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema Escolar</title>
    <style>
        body { font-family: sans-serif; margin: 20px; line-height: 1.6; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f4f4f4; }
        .form-section { background: #f9f9f9; padding: 15px; border: 1px solid #ddd; margin-bottom: 20px; }
    </style>
</head>
<body>

    <h1>Gerenciamento Escolar</h1>

        <h2>2. Matricular Aluno</h2>
        <form method="POST">
            <input type="hidden" name="add_aluno" value="1">
            Matrícula: <input type="text" name="matricula" required size="10">
            Nome: <input type="text" name="nome_aluno" required>
            Email: <input type="email" name="email" required>
            

            <button type="submit">Matricular Aluno</button>
        </form>
    </div>

    <hr>

 
</body>
</html>
