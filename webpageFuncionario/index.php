<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Studio Ghibli</title>
</head>
<body>

    <header class="header-site">

        <a href="#" class="img">
            <img src="https://indy-systems.imgix.net/tsa14o3kh1lt3ts7b8vwz6m3atbk?max-w=1000" alt="logo" style="height: 130px;">
        </a>    

        <ul class="header-link-list">
            <li class="header-link">
                <a href="#">Início</a>
            </li>
            <li class="header-link">
                <a href="#">Sobre</a>
            </li>
            <li class="header-link">
                <a href="#">Suporte</a>
            </li>
        </ul>
        
    </header>

    
    <section class="cadastro">
        <h1>Cadastro de Funcionário</h1>
        <form method="get" class="form-cadastro">
            <input type="text" name="nome" id="nome" placeholder="Nome: " class="input-form-cadastro">

            <input type="number" name="salario" id="salario" placeholder="Salário: " class="input-form-cadastro">

            <select name="cargo" id="cargo">
                <option value="Gerente">Gerente</option>
                <option value="Analista de TI">Analista de TI</option>
                <option value="Desenvolvedora">Desenvolvedora</option>
                <option value="Designer">Designer</option>
                <option value="Assistente Administrativo">Assistente Administrativo</option>
                <option value="Consultor">Consultor</option>
            </select>
            
            <input type="number" name="idade" id="idade" placeholder="Idade: " class="input-form-cadastro">

            <input type="text" name="tel" id="tel" placeholder="Telefone: " class="input-form-cadastro">

            <input type="submit" value="Cadastrar" class="cadastro-button">
        </form>
        <?php
            $servidor = 'localhost';
            $usuario = 'root';
            $senha = '';
            $banco_de_dados = 'empresa';
            $conexao = mysqli_connect($servidor,$usuario,$senha,$banco_de_dados);

            if(isset($_GET['nome'], $_GET['salario'], $_GET['cargo'], $_GET['idade'], $_GET['tel'])) {
                $nome = $_GET['nome']; 
                $salario = $_GET['salario'];
                $cargo = $_GET['cargo'];
                $idade = $_GET['idade'];    
                $tel = $_GET['tel'];

                $conexao->query("insert into funcionario (nome, cargo, idade, tel, salario) values ('$nome', '$cargo', '$idade', '$tel', '$salario')");
                $conexao->close();
            }
        ?>
    </section>
    

    <section class="filter">
        <form method="get" class="form-filter">
            <select name="cargo-filter" id="cargo-filter">
                <option value="Selecionar">-- Selecionar --</option>
                <option value="Gerente">Gerente</option>
                <option value="Analista de TI">Analista de TI</option>
                <option value="Desenvolvedora">Desenvolvedora</option>
                <option value="Designer">Designer</option>
                <option value="Assistente Administrativo">Assistente Administrativo</option>
                <option value="Consultor">Consultor</option>
            </select>

            <input type="submit" value="Filtrar" class="filter-button">
        </form>

        <div class="card-container">
            <?php
                $servidor = 'localhost';
                $usuario = 'root';
                $senha = '';
                $banco_de_dados = 'empresa';
                $conexao = mysqli_connect($servidor,$usuario,$senha,$banco_de_dados);
                
                if(isset($_GET['cargo-filter']) && $_GET['cargo-filter'] != "Selecionar" ){
                    $cargoFilter = $_GET['cargo-filter'];
                    $selectFuncionarios = $conexao->query("select * from funcionario where cargo = '$cargoFilter'");
                    $rowFuncionario = $selectFuncionarios->fetch_all(MYSQLI_ASSOC);
                    foreach ($rowFuncionario as $funcionario){
                        include 'template.php';
                    };
                }else if(!isset($_GET['cargo-filter']) || ($_GET['cargo-filter'] == "Selecionar")){
                    $selectFuncionarios = $conexao->query('select * from funcionario');
                    $rowFuncionario = $selectFuncionarios->fetch_all(MYSQLI_ASSOC);
                    foreach ($rowFuncionario as $funcionario){
                        include 'template.php';
                    };
                }

                $conexao->close();
            ?>
        </div>
        
    </section>
    

    <footer class="footer-site">
        <a href="#" class="img">
            <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/c45c69b2-249c-40d1-9981-6c7ade872a9a/dhbd04u-48418a16-5a7c-450d-8eb1-339ae02fc660.gif?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2M0NWM2OWIyLTI0OWMtNDBkMS05OTgxLTZjN2FkZTg3MmE5YVwvZGhiZDA0dS00ODQxOGExNi01YTdjLTQ1MGQtOGViMS0zMzlhZTAyZmM2NjAuZ2lmIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.bRyLL2GHKUjx8OjEKWJlPecsWWlcqYhve6RYE58HwDo" alt="logo">
        </a>
    </footer>

</body>
</html>