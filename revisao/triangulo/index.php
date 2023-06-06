<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Triângulo</title>
</head>
<body>
    <h1>Cadastro de Triângulo</h1>
    <form action="acaotriangulo.php" method="post">
        <label for="id">Id:</label>
        <input readonly type="text" name='id' id='id' >
        <label for="lado1">Lado 1:</label>
        <input type="text" name='lado1' id='lado1' >
        <label for="lado2"> Lado 2:</label>
        <input type="text" name='lado2' id='lado2' >
        <label for="lado3"> Lado 3:</label>
        <input type="text" name='lado3' id='lado3' >
        <label for="cor">Cor:</label>
        <input type="color" name='cor' id='cor' >
        <label for="un">UN:</label>
        <input type="text" name='un' id='un' >
        <button name='acao' type='submit' id='acao' value='salvar'>Salvar</button>
    </form>
</body>
</html>