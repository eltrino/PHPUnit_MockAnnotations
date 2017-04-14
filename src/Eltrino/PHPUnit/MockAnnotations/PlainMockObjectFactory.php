<?php

namespace Eltrino\PHPUnit\MockAnnotations;

use PHPUnit\Framework\TestCase;

class PlainMockObjectFactory implements MockObjectFactory
{
    private $testCase;

    public function __construct(TestCase$testCase)
    {
        $this->testCase = $testCase;
    }

    /**
     * Creates simple PHPUnit Mock Object with disabled original constructor
     * @param string $classToMock
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function create($classToMock)
    {
        $mockBuilder = new \PHPUnit_Framework_MockObject_MockBuilder(
            $this->testCase, $classToMock
        );
        $mockBuilder->disableOriginalConstructor();
        return $mockBuilder->getMock();
    }
}
