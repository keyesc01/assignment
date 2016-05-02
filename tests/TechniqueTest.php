<?php
namespace ItbTest;

use Itb\Model\Technique;

class TechniqueTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetId()
    {
        // Arrange
        $qm = new Technique();
        $expectedResult = 0;

        // Act
        $result = $qm->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


    public function testCanGetDescription()
    {
        // Arrange
        $qm = new Technique();
        $expectedResult = 0;

        // Act
        $result = $qm->getDescription();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanSetDescription()
    {
        // arrange
        $qm = new Technique();
        $expectedResult = 'text';
        $qm ->setDescription($expectedResult);

        // Act
        $result = $qm->getDescription();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanGetBelt()
    {
        // Arrange
        $qm = new Technique();
        $expectedResult = 0;

        // Act
        $result = $qm->getBelt();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
    public function testCanSetBelt()
    {
        // arrange
        $qm = new Technique();
        $expectedResult = 'text';
        $qm ->setBelt($expectedResult);

        // Act
        $result = $qm->getBelt();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }
}
