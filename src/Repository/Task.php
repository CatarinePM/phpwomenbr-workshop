<?php declare (strict_types = 1);
namespace App\Repository;

use App\Model\Task as Model;

class Task
{
    protected $pdo;

    public function __construct(array $config)
    {
        if (isset($config['PDO']) && $this->validatePDONode($config['PDO'])) {
            try {
                $pdo = new \PDO(
                    $config['PDO']['dsn'],
                    $config['PDO']['user'] ?? null,
                    $config['PDO']['password'] ?? null,
                    $config['PDO']['options'] ?? []
                );
                $this->pdo = $pdo;
            } catch (\PDOException $pdoException) {
                echo $pdoException->getMessage();
                exit;
            }
        } else {
            var_dump($config);
        }
    }

    public function validatePDONode(array $node): bool
    {
        if (!isset($node['dsn'])) {
            return false;
        }
        if (strpos($node['dsn'], 'sqlite:') !== false) {
            return true;
        }
        return isset($node['user']) && isset($node['password']);
    }

    public function find(): array
    {
        $sql = 'SELECT id, title, status, expires FROM tasks';
        $statement = $this->pdo->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, Model::class);
        $statement->execute();
        return $statement->fetchAll();
    }
}
