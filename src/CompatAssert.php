<?php

namespace Fooman\PhpunitBridge;

if (class_exists(\PHPUnit\Framework\Assert::class)) {
    class CompatAssert extends \PHPUnit\Framework\Assert
    {
    }
} else {
	class CompatAssert extends \PHPUnit_Framework_Assert
	{

	}
}
