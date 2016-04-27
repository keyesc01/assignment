<?php
namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class Student
 * @package Itb\Model
 */
class Student extends DatabaseTable
{
    /**
     * the objects unique ID
     * @var int $id
     */
    private $id;

    /**
     * @var string $username
     */
    private $username;

    /**
     *
     * @var string $password
     */
    private $password;

    /**
     * @var date $joined
     */
    private $joined;

    /**
     * integer value from 0 .. 100
     * @var char $lastGrade
     */
    private $lastGrade;

    /**
     * @var char $currentGrade
     */
    private $currentGrade;


    /**
     * get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * get username
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * get password
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * get date joined
     * @return date
     */
    public function getJoined()
    {
        return $this->joined;
    }

    /**
     * get last grade
     * @return char
     */
    public function getLastGrade()
    {
        return $this->lastGrade;
    }

    /**
     * return current grade
     * @return char
     */
    public function getCurrentGrade()
    {
        return $this->currentGrade;
    }

    /**
     * @param $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
    }

    /**
     * @param $joined
     */
    public function setJoined($joined)
    {
        $this->joined = $joined;
    }

    /**
     * @param $lastGrade
     */
    public function setLastGrade($lastGrade)
    {
        $this->lastGrade = $lastGrade;
    }

    /**
     * @param $curGrade
     */
    public function setCurrentGrade($curGrade)
    {
        $this->currentGrade = $curGrade;
    }

    /**
     * find entered username in the db
     * @param $username
     * @return mixed|null
     *
     */
    public static function getOneByUsername($username)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM students WHERE username=:username';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }
}
