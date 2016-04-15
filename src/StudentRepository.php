<?php
namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseManager;
use Monolog\Logger;

class StudentRepository extends DatabaseManager
{
    public function getAll()
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from student');
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Dvd');
        $statement->execute();

        $students = $statement->fetchAll();

        return $students;
    }

    public function getOneById($id)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT id from student');
        $statement->bindParam(':id', $id);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Dvd');
        $statement->execute();

        if ($dvd = $statement->fetch()) {
            return $dvd;
        } else {
            return null;
        }
    }

}