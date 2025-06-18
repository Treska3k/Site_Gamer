<?php
// model/Categoria.php
class Categoria
{
    public $id_categoria;
    public $nome;

    public function __construct($data = [])
    {
        if ($data) {
            $this->id_categoria = $data['id_categoria'] ?? null;
            $this->nome         = $data['nome'];
        }
    }

    public static function all(PDO $pdo): array
    {
        $stmt = $pdo->query('SELECT * FROM categorias ORDER BY nome');
        return $stmt->fetchAll();
    }

    public static function find(PDO $pdo, int $id): ?Categoria
    {
        $stmt = $pdo->prepare('SELECT * FROM categorias WHERE id_categoria = ?');
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        return $data ? new Categoria($data) : null;
    }

    public function insert(PDO $pdo): void
    {
        $stmt = $pdo->prepare('INSERT INTO categorias (nome) VALUES (:nome)');
        $stmt->execute(['nome' => $this->nome]);
        $this->id_categoria = $pdo->lastInsertId();
    }

    public function update(PDO $pdo): void
    {
        $stmt = $pdo->prepare(
            'UPDATE categorias SET nome = :nome WHERE id_categoria = :id'
        );
        $stmt->execute([
            'nome' => $this->nome,
            'id'   => $this->id_categoria
        ]);
    }

    public function delete(PDO $pdo): void
    {
        $stmt = $pdo->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $stmt->execute([$this->id_categoria]);
    }
}
