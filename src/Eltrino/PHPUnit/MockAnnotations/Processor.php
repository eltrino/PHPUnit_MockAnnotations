<?php

namespace Eltrino\PHPUnit\MockAnnotations;

interface Processor
{
    /**
     * Test Case processing
     * @param \PHPUnit_Framework_TestCase $test
     * @return void
     */
    function process(\PHPUnit_Framework_TestCase $test);
}
