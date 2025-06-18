<?php
// controller/ProdutoController.php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Produto.php';
require_once __DIR__ . '/../model/Categoria.php';

class ProdutoController
{
    private static function pdo(): PDO
    {
        global $pdo;
        return $pdo;
    }

    public static function index(): void
    {
        $prods = Produto::all(self::pdo());
        include __DIR__ . '/../view/gerenciar_produtos.php';
    }

    public static function create(): void
    {
        $cats = Categoria::all(self::pdo());
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $p = new Produto([
              'nome'         => trim($_POST['nome']),
              'descricao'    => trim($_POST['descricao']),
              'preco'        => trim($_POST['preco']),
              'imagem'       => trim($_POST['imagem']),
              'id_categoria' => $_POST['id_categoria']
            ]);
            $p->insert(self::pdo());
            header('Location: gerenciar_produtos.php');
            exit;
        }
        include __DIR__ . '/../view/produto_form.php';
    }

    public static function edit(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        $p  = Produto::find(self::pdo(), $id);
        if (!$p) {
            header('Location: gerenciar_produtos.php');
            exit;
        }
        $cats = Categoria::all(self::pdo());
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $p->nome         = trim($_POST['nome']);
            $p->descricao    = trim($_POST['descricao']);
            $p->preco        = trim($_POST['preco']);
            $p->imagem       = trim($_POST['imagem']);
            $p->id_categoria = $_POST['id_categoria'];
            $p->update(self::pdo());
            header('Location: gerenciar_produtos.php');
            exit;
        }
        include __DIR__ . '/../view/produto_form.php';
    }

    public static function delete(): void
    {
        if (isset($_POST['id_produto'])) {
            $p = new Produto(['id_produto' => $_POST['id_produto']]);
            $p->delete(self::pdo());
        }
        header('Location: gerenciar_produtos.php');
        exit;
    }
}
