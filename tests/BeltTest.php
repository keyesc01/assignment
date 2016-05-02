<?php
namespace ItbTest;

use Itb\Model\Belt;

class BeltTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetId()
    {
        // Arrange
        $qm = new Belt();
        $expectedResult = 0;

        // Act
        $result = $qm->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


    public function testCanGetName()
    {
        // Arrange
        $qm = new Belt();
        $expectedResult = 0;

        // Act
        $result = $qm->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanSetName()
    {
        // arrange
        $qm = new Belt();
        $expectedResult = 'text';
        $qm ->setName($expectedResult);

        // Act
        $result = $qm->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }

}
