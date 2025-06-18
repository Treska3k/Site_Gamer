<?php
// acoes.php
session_start();
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/model/Usuario.php';

function redirect(string $path) {
    header("Location: $path");
    exit;
}

// 1) Auto-login pelo cookie “remember_me”
if (!isset($_SESSION['user_id']) && !empty($_COOKIE['remember_me'])) {
    $_SESSION['user_id'] = (int) $_COOKIE['remember_me'];
}

// 2) Logout (via GET ?logout=1)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['logout'])) {
    unset($_SESSION['user_id']);
    setcookie('remember_me', '', time() - 3600, '/');
    redirect('view/home.php');
}

// 3) Criação de usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_usuario'])) {
    $u = new Usuario([
        'nome'            => trim($_POST['nome']),
        'email'           => trim($_POST['email']),
        'telefone'        => trim($_POST['telefone']),
        'data_nascimento' => $_POST['data_nascimento'],
        'senha'           => $_POST['senha']
    ]);
    $u->insert($pdo);
    $_SESSION['user_id'] = $u->id_usuario;       // opcional: loga direto
    redirect('view/index.php');
}

// 4) Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $stmt  = $pdo->prepare("SELECT id_usuario, senha FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $data = $stmt->fetch();
    if ($data && password_verify($senha, $data['senha'])) {
        $_SESSION['user_id'] = $data['id_usuario'];
        if (!empty($_POST['remember'])) {
            setcookie('remember_me', $data['id_usuario'], time() + 7*24*3600, '/');
        }
        redirect('view/index.php');
    } else {
        $_SESSION['flash'] = 'Credenciais inválidas.';
        redirect('view/login.php');
    }
}

// 5) Formulário “Fale Conosco”
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contato'])) {
    // aqui você envia e-mail ou grava no BD
    $_SESSION['flash'] = 'Mensagem enviada com sucesso!';
    redirect('view/contato.php');
}

// Caso não caia em nada, volta pra home
redirect('view/home.php');
