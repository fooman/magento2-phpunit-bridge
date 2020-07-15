<?php

namespace Fooman\PhpunitBridge;

$reflection = new \ReflectionClass(\Magento\Framework\TestFramework\Unit\Helper\ObjectManager::class);
if (!$reflection) {
    throw new \Exception('Can\'t find Magento Test Framework ObjectManager - is this a Magento 2 project?');
}
class CompatTestCase extends \PHPUnit\Framework\TestCase
{

}
