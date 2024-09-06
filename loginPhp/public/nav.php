<?php
defined('CONTROL') or die('Acesso Negado!');
?>

<hr>
<span>Usuário: <strong><?= $_SESSION['usuario'] ?></strong></span>
    <span>
        <a href="?rota=logout">Sair</a>
    </span>
<hr>

<nav>
    <a href="?rota=home">Home</a>
    <a href="?rota=page1">Page 1</a>
    <a href="?rota=page2">Page 2</a>
    <a href="?rota=page3">Page 3</a>
    <a href="?rota=logout">Sair</a>
</nav>