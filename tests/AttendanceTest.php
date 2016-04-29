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


    public function testCanGetStudentID()
    {
        // Arrange
        $qm = new Attendance();
        $expectedResult = 0;

        // Act
        $result = $qm->getStudentId();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanSetStudentID()
    {
        // arrange
        $qm = new Attendance();
        $expectedResult = '0';
        $qm ->setStudentId($expectedResult);

        // Act
        $result = $qm->getStudentId();

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

}
