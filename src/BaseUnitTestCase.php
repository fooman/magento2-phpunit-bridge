<?php

namespace Fooman\PhpunitBridge;

use PHPUnit\Framework\MockObject\MockObject;

class BaseUnitTestCase extends CompatTestCase
{

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
