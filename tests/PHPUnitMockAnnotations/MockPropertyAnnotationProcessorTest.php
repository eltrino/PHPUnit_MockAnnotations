<?php

namespace PHPUnitMockAnnotations;

class MockPropertyAnnotationProcessorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     * @Mock PHPUnitMockAnnotations\Tests\Fixture\BInterface
     */
    private $stubPropertyToMock;

    public function testProcess()
    {
        require_once __DIR__ . '/_fixture/BInterface.php';

        $mockBuilder = $this
            ->getMockBuilder('\PHPUnit_Framework_MockObject_MockBuilder')
            ->disableOriginalConstructor()
            ->getMock();

        $mockObjectFactory = $this
            ->getMockBuilder('PHPUnitMockAnnotations\MockObjectFactory')
            ->getMock();

        $mock = $this
            ->getMockBuilder('PHPUnitMockAnnotations\Tests\Fixture\BInterface')
            ->getMock();

        $mockObjectFactory
            ->expects($this->once())
            ->method('create')
            ->with($this->equalTo('PHPUnitMockAnnotations\Tests\Fixture\BInterface'))
            ->will($this->returnValue($mock));

        $property = new \ReflectionProperty($this, 'stubPropertyToMock');

        $processor = new MockPropertyAnnotationProcessor($mockObjectFactory);
        $processor->process($property, $this);
    }
}
