<?php

// iniciar a sessão
session_start();

// definir uima constante de controle
define('CONTROL', true);

// verifica se existe um usuário logado
$usuario_logado = $_SESSION['usuario'] ?? null;

// verifica qual é a rota na URL
if(empty($usuario_logado)) {
    $rota = 'login';
} else {
    $rota = $_GET['rota'] ?? 'home';
}

// se o usuario está logado, e a rota é login
if(!empty($usuario_logado) && $rota == 'login') {
    $rota = 'home';
}

// analisa a rota
$rotas = [
    'login' => 'login.php',
    'home' => 'home.php',
    'logout' => 'logout.php'
];

if(!key_exists($rota, $rotas)) {
    die('Acesso Negado!');
} 

require_once $rotas[$rota];