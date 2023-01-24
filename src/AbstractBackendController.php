<?php

namespace Fooman\PhpunitBridge;

use Magento\TestFramework\TestCase\AbstractBackendController as MagentoAbstractBackendController;

class AbstractBackendController extends MagentoAbstractBackendController
{
    public static function assertStringContainsString(string $needle, string $haystack, string $message = ''): void
    {
        if (is_callable(MagentoAbstractBackendController::class.'::assertStringContainsString')) {
            parent::assertStringContainsString($needle, $haystack, $message);
        } else {
            parent::assertContains($needle, $haystack, $message);
        }
    }

    public static function assertStringNotContainsString(string $needle, string $haystack, string $message = ''): void
    {
        if (is_callable(MagentoAbstractBackendController::class.'::assertStringContainsString')) {
            parent::assertStringNotContainsString($needle, $haystack, $message);
        } else {
            parent::assertNotContains($needle, $haystack, $message);
        }
    }
}
