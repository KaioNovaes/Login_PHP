<?php
defined('CONTROL') or die('Acesso Negado!');

// efetuar o logout:
session_destroy();

// voltar para a pagina inicial:
header('Location: index.php?rota-login');