<?php
/**
 * student class
 */
namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class Attendance
 * @package Itb\Model
 */
class Attendance extends DatabaseTable
{
    /**
     * the objects unique ID
     * @var int $id
     */
    private $id;
    /**
     * username
     * @var string
     */
    private $username;

    /**
     * date
     * @var string
     */
    private $date;


    /**
     * get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * get student username
     * @return int
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * set student username
     * @param int $studentId
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * get date
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * set date
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


    /**
     * get username from attendance table
     * @param $username
     * @return mixed|null
     */
    public static function getOneByUsername($username)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * FROM attendances WHERE username=:username';
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
