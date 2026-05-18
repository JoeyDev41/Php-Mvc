<?php

class ResourceRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }
    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM resources ORDER BY created_at DESC');

        return array_map([Resource::class, 'fromArray'], $stmt->fetchAll());
    }
    public function findById(int $id): ?Resource
    {
        $stmt = $this->pdo->prepare('SELECT * FROM resources WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return $row ? Resource::fromArray($row) : null;
    }
    public function insert(array $data): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO resources (title, type, status, borrower) VALUES (:title, :type, :status, :borrower)'
        );
        $stmt->execute([
            'title' => trim($data['title']),
            'type' => trim($data['type']),
            'status' => $data['status'],
            'borrower' => trim($data['borrower'] ?? '') ?: null,
        ]);
    }
    public function update(int $id, array $data): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE resources SET title = :title, type = :type, status = :status, borrower = :borrower WHERE id = :id'
        );
        $stmt->execute([
            'id' => $id,
            'title' => trim($data['title']),
            'type' => trim($data['type']),
            'status' => $data['status'],
            'borrower' => trim($data['borrower'] ?? '') ?: null,
        ]);
    }
    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM resources WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
