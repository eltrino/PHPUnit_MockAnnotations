<?php

namespace Eltrino\PHPUnit\MockAnnotations;

use PHPUnit\Framework\TestCase;

interface Processor
{
    /**
     * Test Case processing
     * @param TestCase $test
     * @return void
     */
    function process(TestCase $test);
}
