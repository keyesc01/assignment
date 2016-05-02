<?php
/**
 * technique class
 */
namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class Techniques
 * @package Itb\Model
 */
class Technique extends DatabaseTable
{
    /**
     * the objects unique ID
     * @var int $id
     */
    private $id;
    /**
     * description
     * @var string
     */
    private $description;


    /**
     * get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * get description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * set description
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
