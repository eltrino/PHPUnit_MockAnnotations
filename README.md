# PHPUnit MockAnnotations

This provide a simplified way to create native PHPUnit mocks in test cases using annotations in properties doc block. Currently creation of mocks for abstract classes is not supported.

###Installation

Installation via composer

```
composer require eltrino/phpunit-mockannotations
```
or add it to your composer.json file.

### Usage

```php

namespace Lib\Tests;

use Lib\Generator;
use Lib\ConfigInterface;
use Eltrino\PHPUnit\MockAnnotations\MockAnnotations;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    /**
     * @Mock Lib\ConfigInterface
     */
    private $config;
    
    protected function setUp()
    {
        MockAnnotations::init($this);
    }
    
    public function testProcess()
    {
        $config
            ->expects($this->once())
            ->method('getOption')
            ->with($this->equalTo('title'))
            ->will($this->returnValue('option_value'));
            
        $generator = new Generator($this->config);
        $result = $generator->process();
        
        $this->assertIsNotNull($result);
    }
}
```

###License
MIT


## Contributing

We welcome all kinds of contributions in the form of bug reporting, patches submitting, feature requests or documentation enhancement. Please refer to our [guidelines for contributing](https://github.com/eltrino/PHPUnit_MockAnnotations/blob/master/Contributing.md) if you wish to be a part of the project.
