<?php

namespace Fooman\PhpunitBridge;

class BaseUnitTestCase extends CompatTestCase
{

    public function getMock(
        $originalClassName,
        $methods = [],
        array $arguments = [],
        $mockClassName = '',
        $callOriginalConstructor = true,
        $callOriginalClone = true,
        $callAutoload = true,
        $cloneArguments = false,
        $callOriginalMethods = false,
        $proxyTarget = null
    ) {
        if (is_callable('parent::getMock')) {
            return parent::getMock(
                $originalClassName,
                $methods,
                $arguments,
                $mockClassName,
                $callOriginalConstructor,
                $callOriginalClone,
                $callAutoload,
                $cloneArguments,
                $callOriginalMethods,
                $proxyTarget
            );
        }
        //TODO only first 5 arguments are dealt with
        return $this->useMockBuilderToCreateMock(
            $originalClassName,
            $methods,
            $arguments,
            $mockClassName,
            $callOriginalConstructor
        );
    }

    public function getMockForAbstractClass(
        $originalClassName,
        array $arguments = [],
        $mockClassName = '',
        $callOriginalConstructor = true,
        $callOriginalClone = true,
        $callAutoload = true,
        $mockedMethods = [],
        $cloneArguments = false
    ) {
        if (is_callable('parent::getMockForAbstractClass')) {
            return parent::getMockForAbstractClass(
                $originalClassName,
                $arguments,
                $mockClassName,
                $callOriginalConstructor,
                $callOriginalClone,
                $callAutoload,
                $mockedMethods,
                $cloneArguments
            );
        }

        //TODO only 5 arguments are dealt with
        return $this->useMockBuilderToCreateMock(
            $originalClassName,
            $mockedMethods,
            $arguments,
            $mockClassName,
            $callOriginalConstructor
        );
    }

    protected function createMock($originalClassName)
    {
        if (is_callable('parent::createMock')) {
            return parent::createMock($originalClassName);
        }

        return $this->getMockBuilder($originalClassName)
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->disableArgumentCloning()
                    ->getMock();
    }

    protected function createPartialMock($originalClassName, array $methods)
    {
        if (is_callable('parent::createPartialMock')) {
            return parent::createPartialMock($originalClassName, $methods);
        }

        return $this->getMockBuilder($originalClassName)
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->disableArgumentCloning()
                    ->setMethods(empty($methods) ? null : $methods)
                    ->getMock();
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
