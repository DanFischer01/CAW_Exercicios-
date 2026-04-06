<?php  

$nomeArq="dados.txt";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sigla=$_POST ["sigla"];
    $nome=$_POST ["nome"];
    $carga=$_POST ["carga"];
    if(!file_exists($nomeArq)){
    $arq=fopen($nomeArq, "w") or die("Não foi possivel abrir o arquivo");
    $linha="sigla; nome; carga\n";
    fwrite($arq, $linha);
    fclose($arq);
    }
    $arq=fopen($nomeArq, 'a') or die("Não foi possivel abrir o arquivo");
    $linha=$sigla.";".$nome.";".$carga."\n";
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

        <h2> Adicionar Disciplina</h2>
        <form method="POST">
            <input type="hidden" name="add_aluno" value="1">
            Sigla: <input type="text" name="sigla" required size="10">
            Nome: <input type="text" name="nome" required>
            Carga: <input type="number" name="carga" required>
            

            <button type="submit">Adicionar Disciplina</button>
        </form>
    </div>

    <hr>

 
</body>
</html>