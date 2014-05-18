<?php

namespace PHPUnitMockAnnotations;

use PHPUnitMockAnnotations\TestCaseProcessor;

class TestCaseProcessorTest extends \PHPUnit_Framework_TestCase
{
    public function testProcess()
    {
        $annotationProcessor = $this
            ->getMockBuilder('PHPUnitMockAnnotations\PropertyAnnotationProcessor')
            ->getMock();

        $annotationProcessor
            ->expects($this->any())
            ->method('process')
            ->with(
                $this->logicalAnd(
                    $this->isType(\PHPUnit_Framework_Constraint_IsType::TYPE_OBJECT),
                    $this->isInstanceOf('\ReflectionProperty')
                ), $this->equalTo($this)
            );

        $processor = new TestCaseProcessor($annotationProcessor);
        $processor->process($this);
    }
}
