<?php

namespace Eltrino\PHPUnit\MockAnnotations;

class MockAnnotations
{
    /**
     * Process given test case.
     * Generate and assign mock objects to properties which has @Mock annotation
     * Example of declaration of @Mock annotation for property:
     * class ATest extends \PHPUnit_Framework_TestCase {
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
     * @param \PHPUnit_Framework_TestCase $test
     */
    public static function init(\PHPUnit_Framework_TestCase $test) {
        $processor = new TestCaseProcessor(
            new MockPropertyAnnotationProcessor(
                new PlainMockObjectFactory($test)
            )
        );
        $processor->process($test);
    }
}
