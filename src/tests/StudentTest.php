<?php
namespace ItbTest;

use Itb\Model\Student;

class StudentTest extends \PHPUnit_Framework_TestCase
{


    public function testCanGetId()
    {
        // Arrange
        $qm = new Student();
        $expectedResult = 1;

        // Act
        $result = $qm->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
