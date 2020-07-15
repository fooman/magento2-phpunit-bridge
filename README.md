# How to Use

The aim is to be able to write phpunit tests for phpunit 9 and then be able to run these for Magento 2.4 and Magento 2.3 and 2.2 (more accurately their associated magento/framework versions and phpunit versions). Earlier versions bridged between phpunit 4 and 6.

Install with

```
composer require fooman/magento2-phpunit-bridge --dev
```

and then have your tests extend `\Fooman\PhpunitBridge\BaseUnitTestCase`:

```
<?php

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;

class MyClassToTest extends \Fooman\PhpunitBridge\BaseUnitTestCase
{

    public function setUp(): void
    {
        $objectManager = new ObjectManager($this);
    }

    public function testFunctionality()
    {
        $mock = $this->createMock(\Vendor\Module\MyClass::class);
    }
}

this will now work on Magento 2.3 as well without failures related to not using \PHPUnit_Framework_TestCase. 