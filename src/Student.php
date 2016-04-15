<?php
namespace Itb;

/**
 * Created by PhpStorm.
 * User: matt
 * Date: 26/01/2016
 * Time: 10:44
 *
 * represent DVD objects for use in voting system
 *
 *
<th> ID </th>
<th> title </th>
<th> category </th>
<th> price </th>
<th> vote average </th>
<th> num votes </th>
<th> stars </th>
 *
 */
class Student
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
}