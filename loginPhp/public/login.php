<?php

defined('CONTROL') or die('Acesso Negado!');

// verificar se o formulário foi submetido
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // verifica se o usuario e a senha foram submetidas
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $erro = null;

    if(empty($usuario) || empty($senha)) {
        $erro = "Usuário e senha são obrigatorios!";
    }

    // verifica se o usuario e senha sao validos
    if(empty($erro)) {
        $usuarios = require_once __DIR__ . '/../inc/usuarios.php';

        foreach($usuarios as $user) {
            if($user['usuario'] == $usuario && password_verify($senha, $user['senha'])) {
                // efetua o login
                $_SESSION['usuario'] = $usuario;
            
                //volta a pagina inicial
                header('Location: index.php?rota=home');
                exit;
            }
        }

        // login invalido
        $erro = "Usuario e/ou senha inválidos!";
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="index.php?rota=login" method="post"> 
        <h3>Login</h3>
        <div>
            <label for="usuario">Login</label>
            <input type="emailxt" name="usuario" id="usuario">
        </div>
        <div>
            <label for="senha">Password</label>
            <input type="password" name="senha" id="senha">
        </div>
        <div>
            <button type="submit">Entrar</button>
        </div>
    </form>
    
    <?php if(!empty($erro)) : ?>
        <p style="color: red" ><?= $erro ?></p>
    <?php endif; ?>
</body>
</html>