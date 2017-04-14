<?php

namespace Eltrino\PHPUnit\MockAnnotations;

use PHPUnit\Framework\TestCase;

interface PropertyAnnotationProcessor
{
    /**
     * Property processing
     * @param \ReflectionProperty $property
     * @param TestCase $test
     * @return void
     */
    function process(\ReflectionProperty $property, TestCase $test);
}
