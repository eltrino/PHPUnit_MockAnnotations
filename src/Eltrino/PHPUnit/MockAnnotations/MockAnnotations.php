<?php

namespace Eltrino\PHPUnit\MockAnnotations;

use PHPUnit\Framework\TestCase;

class MockAnnotations
{
    /**
     * Process given test case.
     * Generate and assign mock objects to properties which has @Mock annotation
     * Example of declaration of @Mock annotation for property:
     * class ATest extends \PHPUnit\Framework\TestCase {
     *     /**
     *      * @Mock BClass
     *      *\/
     *     private $b;
     *
     *     /**
     *      * @Mock C/CInterface
     *     *\/
     *     protected $c;
     * }
     * @param TestCase $test
     */
    public static function init(TestCase $test) {
        $processor = new TestCaseProcessor(
            new MockPropertyAnnotationProcessor(
                new PlainMockObjectFactory($test)
            )
        );
        $processor->process($test);
    }
}
