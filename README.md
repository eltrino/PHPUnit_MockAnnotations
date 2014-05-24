PHPUnit MockAnnotations
=======================

This provide a simplified way to create native PHPUnit mocks in test cases using annotations in properties doc block. Currently creating of mocks for abstract classes is not support.

Installation
============
Installation via composer

```
composer require psw/phpunit-mockannotations
```
or add it to your composer.json file.

Usage 
=====

```php

namespace Lib\Tests;

use Lib\Generator;
use Lib\ConfigInterface;

class GeneratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @Mock Lib\ConfigInterface
     */
    private $config;
    
    protected function setUp()
    {
        MockAnnotations.init($this);
    }
    
    public function testProcess()
    {
        $config
            ->expects($this->once())
            ->method('getOption')
            ->with($this->equalTo('title'))
            ->will($this->returnValue('option_value));
            
        $generator = new Generator($this->config);
        $result = $generator->process();
        
        $this->assertIsNotNull($result);
    }
}
```

License
=======
MIT


