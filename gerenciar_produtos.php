<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: view/login.php');
    exit;
}
require_once __DIR__ . '/controller/ProdutoController.php';
ProdutoController::index();
