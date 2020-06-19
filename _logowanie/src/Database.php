<?php

declare(strict_types=1);

namespace Application;

use Application\Exception\ConfigurationException;
use Application\Exception\ConnectionException;
use Application\Exception\ApplicationException;
use Application\Exception\OperationException;
use PDOException;
use Throwable;
use PDO;
use Application\Request;

class Database
{
    private PDO $connection;
    public function __construct(array $config)
    {
        try {
            $this->validateConfg($config);
            $this->createConnection($config);
            $this->client = new \GuzzleHttp\Client();
        } catch (PDOException $e) {
            throw new ConnectionException('Connection Error');
        }
    }

    public function register($login, $password, $email, $userType): void
    {
        $hasz = md5($login . hash('sha256', $password));
        $query = $this->connection->prepare("
            INSERT INTO osoba(userName, pass, email, userType,hasz)
            VALUES(:login,:password,:email,:userType,:hasz)
            ");
        $query->bindParam(':login', $login);
        $query->bindParam(':password', $password);
        $query->bindParam(':email', $email);
        $query->bindParam(':userType', $userType);
        $query->bindParam(':hasz', $hasz);
        $query->execute();
    }
    public function listUsers(): array
    {
        $query = "SELECT * from osoba";
        $result = $this->connection->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecord($id): array
    {
        $query = $this->connection->prepare("SELECT * FROM osoba WHERE id=:id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch();;
    }

    public function editUser($login, $password, $email, $id, $hasz, $urlFoto = ''): void
    {
        $haszNew = md5($login . hash('sha256', $password));
        $_SESSION['hasz'] = $haszNew;
        $query = $this->connection->prepare("UPDATE osoba SET userName = :login,pass = :password,email=:email,hasz = :hasz,urlFoto = :urlFoto WHERE id= :id");
        $query->bindParam(':login', $login);
        $query->bindParam(':password', $password);
        $query->bindParam(':email', $email);
        $query->bindParam(':id', $id);
        $query->bindParam(':hasz', $haszNew);
        $query->bindParam(':urlFoto', $urlFoto);
        $query->execute();
        $this->client->request('POST', 'http://tank.iai-system.com/api/user/edit', [
            'form_params' => [
                'login' => "$login",
                'key' => "$hasz",
                'new_password' => "$password",
                'icon' => "$urlFoto"
            ]
        ]);
    }

    public function loginPassword($login, $password = null)
    {
        $checkPassword = $password === null ? false : true;

        if ($checkPassword == false) {
            $query = $this->connection->prepare("SELECT * FROM osoba WHERE userName=:login");
        } else {
            $query = $this->connection->prepare("SELECT * FROM osoba WHERE userName=:login AND pass=:password");
            $query->bindParam(':password', $password);
        }
        $query->bindParam(':login', $login);
        $query->execute();

        if ($checkPassword == false) {

            return $query->fetch() === false ? false : true;
        } else {
            return $query->fetch();
        }
    }

    private function createConnection(array $config): void
    {
        $dsn = "mysql:dbname={$config['database']};host=${config['host']}";
        $this->connection = new PDO(
            $dsn,
            $config['user'],
            $config['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    private function validateConfg(array $config): void
    {
        if (
            empty($config['database'])
            || empty($config['host'])
            || empty($config['user'])
            || empty($config['password'])
        ) {
            throw new ConfigurationException('Storage configuration error');
        };
    }
}
