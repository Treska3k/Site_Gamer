<?php
// model/Produto.php
class Produto
{
    public $id_produto;
    public $nome;
    public $descricao;
    public $preco;
    public $imagem;
    public $id_categoria;

    public function __construct(array $data = [])
    {
        $this->id_produto   = $data['id_produto']   ?? null;
        $this->nome         = $data['nome']         ?? '';
        $this->descricao    = $data['descricao']    ?? '';
        $this->preco        = $data['preco']        ?? 0;
        $this->imagem       = $data['imagem']       ?? '';
        $this->id_categoria = $data['id_categoria'] ?? null;
    }

    public static function all(PDO $pdo): array
    {
        $sql = "
          SELECT 
            p.*,
            c.nome AS categoria
          FROM produtos p
          LEFT JOIN categorias c USING(id_categoria)
          ORDER BY p.nome
        ";
        return $pdo->query($sql)->fetchAll();
    }

    public static function find(PDO $pdo, int $id): ?Produto
    {
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id_produto = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ? new Produto($row) : null;
    }

    public function insert(PDO $pdo): void
    {
        $stmt = $pdo->prepare("
          INSERT INTO produtos
            (nome, descricao, preco, imagem, id_categoria)
          VALUES
            (:nome, :descricao, :preco, :imagem, :cat)
        ");
        $stmt->execute([
          'nome'      => $this->nome,
          'descricao' => $this->descricao,
          'preco'     => $this->preco,
          'imagem'    => $this->imagem,
          'cat'       => $this->id_categoria
        ]);
        $this->id_produto = $pdo->lastInsertId();
    }

    public function update(PDO $pdo): void
    {
        $stmt = $pdo->prepare("
          UPDATE produtos SET
            nome         = :nome,
            descricao    = :descricao,
            preco        = :preco,
            imagem       = :imagem,
            id_categoria = :cat
          WHERE id_produto = :id
        ");
        $stmt->execute([
          'nome'      => $this->nome,
          'descricao' => $this->descricao,
          'preco'     => $this->preco,
          'imagem'    => $this->imagem,
          'cat'       => $this->id_categoria,
          'id'        => $this->id_produto
        ]);
    }

    public function delete(PDO $pdo): void
    {
        $stmt = $pdo->prepare("DELETE FROM produtos WHERE id_produto = ?");
        $stmt->execute([$this->id_produto]);
    }
}
