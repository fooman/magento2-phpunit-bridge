<?php

namespace Fooman\PhpunitBridge;

use PHPUnit\Framework\MockObject\MockObject;

class BaseUnitTestCase extends CompatTestCase
{
    public static function assertStringContainsString(string $needle, string $haystack, string $message = ''): void
    {
        if (is_callable(self::class . '::assertStringContainsString')) {
            parent::assertStringContainsString($needle, $haystack, $message);
        } else {
            parent::assertContains($needle, $haystack, $message);
        }
    }

    public static function assertStringNotContainsString(string $needle, string $haystack, string $message = ''): void
    {
        if (is_callable(self::class . '::assertStringContainsString')) {
            parent::assertStringNotContainsString($needle, $haystack, $message);
        } else {
            parent::assertNotContains($needle, $haystack, $message);
        }
    }

    public static function assertIsString($actual, string $message = ''): void
    {
        if (is_callable(self::class . '::assertIsString')) {
            parent::assertIsString($actual, $message);
        } else {
            parent::assertInternalType('string', $actual, $message);
        }
    }

    private function useMockBuilderToCreateMock(
        $originalClassName,
        $methods,
        array $arguments,
        $mockClassName,
        $callOriginalConstructor
    ) {
        $builder = $this->getMockBuilder($originalClassName)
                        ->setMethods($methods)
                        ->setConstructorArgs($arguments)
                        ->setMockClassName($mockClassName);

        if ($callOriginalConstructor) {
            $builder->enableOriginalConstructor();
        } else {
            $builder->disableOriginalConstructor();
        }

        return $builder->getMock();
    }
}
