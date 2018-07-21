<?php

namespace Fooman\PhpunitBridge;

$reflection = new \ReflectionClass(\Magento\Framework\TestFramework\Unit\Helper\ObjectManager::class);
if (!$reflection) {
    throw new \Exception('Can\'t find Magento Test Framework ObjectManager - is this a Magento 2 project?');
}
$type = $reflection->getConstructor()->getParameters()[0]->getType();

if ($type === \PHPUnit\Framework\TestCase::class) {
    if (!class_exists(\PHPUnit\Framework\TestCase::class)) {
        class_alias(\PHPUnit_Framework_TestCase::class, \PHPUnit\Framework\TestCase::class);
    }

    class CompatTestCase extends \PHPUnit\Framework\TestCase
    {

    }
} else {
    if (!class_exists(\PHPUnit_Framework_TestCase::class)) {
        class_alias(\PHPUnit\Framework\TestCase::class, \PHPUnit_Framework_TestCase::class);
    }

    class CompatTestCase extends \PHPUnit_Framework_TestCase
    {

    }
}
