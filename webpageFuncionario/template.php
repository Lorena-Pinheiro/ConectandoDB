<div class="card-funcionario">
    <header class="header-card">
        <h2>Nome: <?= $funcionario['nome']?></h2>
        <p>Cargo: <?= $funcionario['cargo']?></p>
        <p>Idade: <?= $funcionario['idade']?></p>
    </header>
    <footer class="footer-card">
        <a href="tel:<?= $funcionario['tel']?>">Telefone: <?= $funcionario['tel']?></a>
        <span>ID: <?= $funcionario['id_funcionario']?></span>
    </footer>
</div>