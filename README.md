# How to Use

The aim is to be able to write phpunit tests for phpunit 6 and then be able to run these for Magento 2.1 and Magento 2.2. (more accurately their associated magento/framework versions and phpunit versions).

Install with

```
composer require fooman/magento2-phpunit-bridge --dev
```

and then have your tests extend `\Fooman\PhpunitBridge\BaseUnitTestCase`:

```
<?php

class MyClassToTest extend \Fooman\PhpunitBridge\BaseUnitTestCase
{
    public function testFunctionality()
    {
        $mock = $this->createMock(\Vendor\Module\MyClass::class);
    }
}

this will now work on Magento 2.1 as well without failures related to not using \PHPUnit_Framework_TestCase. 