<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome">

        <label for="salario">Salário: </label>
        <input type="number" name="salario" id="salario">

        <select name="cargo" id="cargo">
            <option value="Gerente">Gerente</option>
            <option value="Analista de TI">Analista de TI</option>
            <option value="Desenvolvedora">Desenvolvedora</option>
            <option value="Designer">Designer</option>
            <option value="Assistente Administrativo">Assistente Administrativo</option>
            <option value="Consultor">Consultor</option>
        </select>
        

        <label for="idade">Idade: </label>
        <input type="number" name="idade" id="idade">

        <label for="tel">Telefone: </label>
        <input type="text" name="tel" id="tel">

        <input type="submit" value="Cadastrar">
    </form>

    <?php
        $servidor = 'localhost';
        $usuario = 'root';
        $senha = '';
        $banco_de_dados = 'empresa';
        $conexao = mysqli_connect($servidor,$usuario,$senha,$banco_de_dados);

        $nome = $_GET['nome']; 
        $salario = $_GET['salario'];
        $cargo = $_GET['cargo'];
        $idade = $_GET['idade'];
        $tel = $_GET['tel'];

        $conexao->query('insert into funcionario (nome, cargo, idade, tel, salario) values ('$nome', '$cargo', $idade, '$tel', $salario)');
    
    
    ?>

</body>
</html>