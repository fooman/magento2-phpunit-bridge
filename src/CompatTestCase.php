<?php

namespace Fooman\PhpunitBridge;

if (method_exists(\PHPUnit\Runner\Version::class, 'id')
    && version_compare(\PHPUnit\Runner\Version::id(), '6.0.0', '>=')
) {
    class CompatTestCase extends \PHPUnit\Framework\TestCase
    {

    }
} else {
    class CompatTestCase extends \PHPUnit_Framework_TestCase
    {

    }
}