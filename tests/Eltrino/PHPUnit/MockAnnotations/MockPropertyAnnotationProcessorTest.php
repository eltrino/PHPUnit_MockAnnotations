<?php

namespace Eltrino\PHPUnit\MockAnnotations;

use PHPUnit\Framework\TestCase;

class MockPropertyAnnotationProcessorTest extends TestCase
{
    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     * @Mock Eltrino\PHPUnit\MockAnnotations\Tests\Fixture\BInterface
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
            ->getMockBuilder('Eltrino\PHPUnit\MockAnnotations\MockObjectFactory')
            ->getMock();

        $mock = $this
            ->getMockBuilder('Eltrino\PHPUnit\MockAnnotations\Tests\Fixture\BInterface')
            ->getMock();

        $mockObjectFactory
            ->expects($this->once())
            ->method('create')
            ->with($this->equalTo('Eltrino\PHPUnit\MockAnnotations\Tests\Fixture\BInterface'))
            ->will($this->returnValue($mock));

        $property = new \ReflectionProperty($this, 'stubPropertyToMock');

        $processor = new MockPropertyAnnotationProcessor($mockObjectFactory);
        $processor->process($property, $this);

        $this->assertNotNull($this->stubPropertyToMock);
        $this->assertTrue(
            ($this->stubPropertyToMock instanceof \Eltrino\PHPUnit\MockAnnotations\Tests\Fixture\BInterface)
        );
    }
}
