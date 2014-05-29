<?php

namespace Eltrino\PHPUnit\MockAnnotations;

interface PropertyAnnotationProcessor
{
    /**
     * Property processing
     * @param \ReflectionProperty $property
     * @param \PHPUnit_Framework_TestCase $test
     * @return void
     */
    function process(\ReflectionProperty $property, \PHPUnit_Framework_TestCase $test);
}
