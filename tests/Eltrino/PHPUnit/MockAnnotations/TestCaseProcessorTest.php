<?php

namespace Eltrino\PHPUnit\MockAnnotations;

use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\TestCase;

class TestCaseProcessorTest extends TestCase
{
    public function testProcess()
    {
        $annotationProcessor = $this
            ->getMockBuilder('Eltrino\PHPUnit\MockAnnotations\PropertyAnnotationProcessor')
            ->getMock();

        $annotationProcessor
            ->expects($this->any())
            ->method('process')
            ->with(
                $this->logicalAnd(
                    $this->isType(IsType::TYPE_OBJECT),
                    $this->isInstanceOf('\ReflectionProperty')
                ), $this->equalTo($this)
            );

        $processor = new TestCaseProcessor($annotationProcessor);
        $processor->process($this);
    }
}
