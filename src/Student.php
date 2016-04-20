<?php
namespace Itb;
use Mattsmithdev\PdoCrud\DatabaseTable;

class Student extends DatabaseTable
{
    /**
     * the objects unique ID
     * @var int
     */
    private $id;

    /**
     * @var string $title
     */
    private $username;

    /**
     * (should become ID of separate CATEGORY class ...)
     * @var string $category
     */
    private $password;

    /**
     * @var float
     */
    private $joined;

    /**
     * integer value from 0 .. 100
     * @var integer
     */
    private $lastGrade;

    /**
     * @var integer
     */
    private $currentGrade;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getJoined()
    {
        return $this->joined;
    }

    public function getLastGrade()
    {
        return $this->lastGrade;
    }

    public function getCurrentGrade()
    {
        return $this->currentGrade;
    }
   

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setJoined($joined)
    {
        $this->joined = $joined;
    }

    public function setLastGrade($lastGrade)
    {
        $this->lastGrade = $lastGrade;
    }

    public function setCurrentGrade($curGrade)
    {
        $this->currentGrade = $curGrade;
    }
}