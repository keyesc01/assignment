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
    public function testCanSetUsername()
    {
        // arrange
        $qm = new Student();
        $expectedResult = 'username';
        $qm ->setUsername($expectedResult);

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
    public function testCanSetPassword()
    {
        // arrange
        $qm = new Student();
        $expectedResult ='pass';
        $qm ->setPassword($expectedResult);

        // Act
        $result = $qm->getPassword();
        $bool = password_verify('pass',$result);

        // Assert
        $this->assertTrue($bool);
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
    public function testCanSetJoined()
    {
        // arrange
        $qm = new Student();
        $expectedResult = '00/00/0000';
        $qm ->setJoined($expectedResult);

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
    public function testCanSetLastGrade()
    {
        // arrange
        $qm = new Student();
        $expectedResult = 'd';
        $qm ->setLastGrade($expectedResult);

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
    public function testCanSetCurrentGrade()
    {
        // arrange
        $qm = new Student();
        $expectedResult = 'd';
        $qm ->setCurrentGrade($expectedResult);

        // Act
        $result = $qm->getCurrentGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }

    public function testCanGetOneByUsernameWhenNoUsername()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = '';

        // Act
        $result = $qm->getOneByUsername($expectedResult);


        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanGetOneByUsername()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = 'ciaran';

        // Act
        $result = $qm->getOneByUsername($expectedResult);

        // Assert
        $this->assertEquals($expectedResult, $result->getUsername());

    }
}
