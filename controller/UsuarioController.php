<?php
// controller/UsuarioController.php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Usuario.php';

class UsuarioController
{
    private static function pdo(): PDO
    {
        global $pdo;
        return $pdo;
    }

    public static function index(): void
    {
        $users = Usuario::all(self::pdo());
        include __DIR__ . '/../view/gerenciar_usuarios.php';
    }

    public static function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $u = new Usuario([
                'nome'            => trim($_POST['nome']),
                'email'           => trim($_POST['email']),
                'telefone'        => trim($_POST['telefone']),
                'data_nascimento' => $_POST['data_nascimento'],
                'senha'           => $_POST['senha']
            ]);
            $u->insert(self::pdo());
            header('Location: gerenciar_usuarios.php');
            exit;
        }
        include __DIR__ . '/../view/usuario_form.php';
    }

    public static function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $u  = Usuario::find(self::pdo(), $id);
        if (!$u) {
            header('Location: gerenciar_usuarios.php');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $u->nome            = trim($_POST['nome']);
            $u->email           = trim($_POST['email']);
            $u->telefone        = trim($_POST['telefone']);
            $u->data_nascimento = $_POST['data_nascimento'];
            $u->senha           = $_POST['senha'];
            $u->update(self::pdo());
            header('Location: gerenciar_usuarios.php');
            exit;
        }
        include __DIR__ . '/../view/usuario_form.php';
    }

    public static function delete(): void
    {
        if (isset($_POST['id_usuario'])) {
            $u = new Usuario(['id_usuario' => $_POST['id_usuario']]);
            $u->delete(self::pdo());
        }
        header('Location: gerenciar_usuarios.php');
        exit;
    }
}
