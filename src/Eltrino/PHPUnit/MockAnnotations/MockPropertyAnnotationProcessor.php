<?php

namespace Eltrino\PHPUnit\MockAnnotations;

use PHPUnit\Framework\TestCase;

class MockPropertyAnnotationProcessor implements PropertyAnnotationProcessor
{
    const REGEX_MOCK = '(@Mock\s+([:.\w\\\\x7f-\xff]+)\s*$)m';

    /**
     * @var MockObjectFactory
     */
    private $mockObjectFactory;

    public function __construct(MockObjectFactory $mockObjectFactory)
    {
        $this->mockObjectFactory = $mockObjectFactory;
    }

    /**
     * Property processing
     * Generate and assign mock object to property if it has @Mock annoitation
     * @param \ReflectionProperty $property
     * @param TestCase $test
     * @return void
     */
    public function process(\ReflectionProperty $property, TestCase $test)
    {
        /** @var \ReflectionProperty $property */
        $propertyDocComment = $property->getDocComment();
        if (preg_match(self::REGEX_MOCK, $propertyDocComment, $matches)) {
            $isPrivate = $property->isPrivate();
            if ($isPrivate) {
                $property->setAccessible(true);
            }
            $mock = $this->mockObjectFactory->create($matches[1]);
            $property->setValue($test, $mock);
            if ($isPrivate) {
                $property->setAccessible(false);
            }
        }
    }
}
