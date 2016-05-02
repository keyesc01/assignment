<?php
/**
 * belt class
 */
namespace Itb\model;

use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class Belt
 * @package Itb\Model
 */
class Belt extends DatabaseTable
{
    /**
     * object id
     * @var id
     */
    private $id;

    /**
     * name of belt
     * @var name
     */
    private $name;

    /**
     * get id
     * @return id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * get name of belt
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * set name of belt
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
