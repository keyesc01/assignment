<?php
namespace ItbTest;

use Itb\Model\Student;

class StudentTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetId()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = 0;

        // Act
        $result = $qm->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanGetUsername()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = 0;

        // Act
        $result = $qm->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanGetPassword()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = 0;

        // Act
        $result = $qm->getPassword();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanGetJoined()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = 0;

        // Act
        $result = $qm->getJoined();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanGetLastGrade()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = 0;

        // Act
        $result = $qm->getLastGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanGetCurrentGrade()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = 0;

        // Act
        $result = $qm->getCurrentGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }

    public function testCanGetOneByUsername()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = 0;

        // Act
        $result = $qm->getOneByUsername($expectedResult);

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
}
