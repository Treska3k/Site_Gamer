<?php
// controller/CategoriaController.php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Categoria.php';

class CategoriaController
{
    private static function pdo()
    {
        global $pdo;
        return $pdo;
    }

    public static function index()
    {
        $cats = Categoria::all(self::pdo());
        include __DIR__ . '/../view/gerenciar_categorias.php';
    }

    public static function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cat = new Categoria(['nome' => trim($_POST['nome'])]);
            $cat->insert(self::pdo());
            header('Location: gerenciar_categorias.php');
            exit;
        }
        include __DIR__ . '/../view/categoria_form.php';
    }

    public static function edit()
    {
        $id  = (int)($_GET['id'] ?? 0);
        $cat = Categoria::find(self::pdo(), $id);
        if (!$cat) {
            header('Location: gerenciar_categorias.php');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cat->nome = trim($_POST['nome']);
            $cat->update(self::pdo());
            header('Location: gerenciar_categorias.php');
            exit;
        }
        include __DIR__ . '/../view/categoria_form.php';
    }

    public static function delete()
    {
        if (isset($_POST['id_categoria'])) {
            $cat = new Categoria(['id_categoria' => $_POST['id_categoria'], 'nome' => '']);
            $cat->delete(self::pdo());
        }
        header('Location: gerenciar_categorias.php');
        exit;
    }
}
