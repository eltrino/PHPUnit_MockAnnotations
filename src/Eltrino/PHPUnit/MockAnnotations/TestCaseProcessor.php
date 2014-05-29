<?php

namespace Eltrino\PHPUnit\MockAnnotations;

class TestCaseProcessor implements Processor
{
    private $exceptions = array();

    /**
     * @var PropertyAnnotationProcessor
     */
    private $propertyAnnotationProcessor;

    public function __construct(PropertyAnnotationProcessor $propertyAnnotationProcessor)
    {
        $this->propertyAnnotationProcessor = $propertyAnnotationProcessor;
    }

    /**
     * Test Case processing
     * Create mock objects for properties of given test case that has annotation @Mock
     * @param \PHPUnit_Framework_TestCase $test
     * @return void
     */
    public function process(\PHPUnit_Framework_TestCase $test)
    {
        $clazz = new \ReflectionObject($test);
        $properties = $clazz->getProperties();
        foreach ($properties as $property) {
            try {
                $this->propertyAnnotationProcessor
                    ->process($property, $test);
            } catch (\Exception $e) {
                $this->exceptions[] = $e;
            }
        }
    }
}
