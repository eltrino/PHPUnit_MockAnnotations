<?php

namespace PHPUnitMockAnnotations;

interface MockObjectFactory
{
    /**
     * Create PHPUnit Mock Object
     * @param string $classToMock
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    function create($classToMock);
}
