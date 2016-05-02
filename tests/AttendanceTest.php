<?php
namespace ItbTest;

use Itb\Model\Attendance;

class AttendanceTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetId()
    {
        // Arrange
        $qm = new Attendance();
        $expectedResult = 0;

        // Act
        $result = $qm->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


    public function testCanGetUsername()
    {
        // Arrange
        $qm = new Attendance();
        $expectedResult = 0;

        // Act
        $result = $qm->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanSetUsername()
    {
        // arrange
        $qm = new Attendance();
        $expectedResult = 'ciaran';
        $qm ->setUsername($expectedResult);

        // Act
        $result = $qm->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanGetDate()
    {
        // Arrange
        $qm = new Attendance();
        $expectedResult = 0;

        // Act
        $result = $qm->getDate();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanSetDate()
    {
        // arrange
        $qm = new Attendance();
        $expectedResult = '00/00/0000';
        $qm ->setDate($expectedResult);

        // Act
        $result = $qm->getDate();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }

    public function testCanGetOneByUsernameWhenNoUsername()
    {
        // Arrange
        $qm = new Attendance();
        $expectedResult = '';

        // Act
        $result = $qm->getOneByUsername($expectedResult);


        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanGetOneByUsername()
    {
        // Arrange
        $qm = new Attendance();
        $expectedResult = 'ciaran';

        // Act
        $result = $qm->getOneByUsername($expectedResult);

        // Assert
        $this->assertEquals($expectedResult, $result->getUsername());

    }

}
