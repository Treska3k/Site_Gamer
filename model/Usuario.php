<?php
class Usuario
{
    public $id_usuario;
    public $nome;
    public $email;
    public $telefone;
    public $data_nascimento;
    public $senha;

    public function __construct(array $d = [])
    {
        $this->id_usuario      = $d['id_usuario']      ?? null;
        $this->nome            = $d['nome']            ?? '';
        $this->email           = $d['email']           ?? '';
        $this->telefone        = $d['telefone']        ?? '';
        $this->data_nascimento = $d['data_nascimento'] ?? null;
        $this->senha           = $d['senha']           ?? '';
    }

    public static function all(PDO $pdo): array
    {
        // seleciona somente colunas existentes
        $sql = "
          SELECT
            id_usuario,
            nome,
            email,
            telefone,
            data_nascimento
          FROM usuarios
          ORDER BY nome
        ";
        return $pdo->query($sql)->fetchAll();
    }

    public static function find(PDO $pdo, int $id): ?Usuario
    {
        $sql = "
          SELECT
            id_usuario,
            nome,
            email,
            telefone,
            data_nascimento,
            senha
          FROM usuarios
          WHERE id_usuario = ?
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ? new Usuario($row) : null;
    }

    public function insert(PDO $pdo): void
    {
        $stmt = $pdo->prepare("
          INSERT INTO usuarios 
            (nome, email, telefone, data_nascimento, senha)
          VALUES 
            (:nome, :email, :tel, :data, :senha)
        ");
        $stmt->execute([
            'nome'  => $this->nome,
            'email' => $this->email,
            'tel'   => $this->telefone,
            'data'  => $this->data_nascimento,
            'senha' => password_hash($this->senha, PASSWORD_DEFAULT)
        ]);
        $this->id_usuario = $pdo->lastInsertId();
    }

    public function update(PDO $pdo): void
    {
        $sql = "
          UPDATE usuarios SET
            nome            = :nome,
            email           = :email,
            telefone        = :tel,
            data_nascimento = :data
        ";
        $params = [
            'nome'  => $this->nome,
            'email' => $this->email,
            'tel'   => $this->telefone,
            'data'  => $this->data_nascimento,
            'id'    => $this->id_usuario
        ];
        if (!empty($this->senha)) {
            $sql           .= ", senha = :senha";
            $params['senha'] = password_hash($this->senha, PASSWORD_DEFAULT);
        }
        $sql .= " WHERE id_usuario = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    }

    public function delete(PDO $pdo): void
    {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        $stmt->execute([$this->id_usuario]);
    }
}
