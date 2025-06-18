<?php
session_start();
// Se não estiver logado, redireciona para o login
if (!isset($_SESSION['user_id'])) {
    header('Location: view/login.php');
    exit;
}
// Chama o controller de Categorias
require_once __DIR__ . '/controller/CategoriaController.php';
CategoriaController::index();
