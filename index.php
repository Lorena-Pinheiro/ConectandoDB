<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        //setando as informações do banco
        $servidor = 'localhost';
        $usuario = 'root';
        $senha = '';
        $banco_de_dados = 'empresa';

        //Criando um objeto dessa conexão
        $conexao = mysqli_connect($servidor,$usuario,$senha,$banco_de_dados);

        //$conexao->query('insert into funcionario (nome, cargo, idade, tel, salario) values ("João Pereira", "Consultor", 40, "61987654321", 6000.00)');

        $selectFuncionarios = $conexao->query('select * from funcionario');

        $rowFuncionario = $selectFuncionarios->fetch_all(MYSQLI_ASSOC);
        
        //Fechando conexão
        $conexao->close();
        
        //Iterando sobre tds os itens da tabela
        //Sempre q passar 
        foreach ($rowFuncionario as $funcionario){
            include 'template.php';
        };    

        
    ?>
</body>
</html>


