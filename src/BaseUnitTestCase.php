<?php

namespace Fooman\PhpunitBridge;

class BaseUnitTestCase extends \Magento\Framework\TestFramework\Unit\BaseTestCase
{

	protected function createMock($originalClassName)
	{
		if (is_callable('parent::createMock')) {
			return parent::createMock($originalClassName);
		} 

        return $this->getMockBuilder($originalClassName)
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->disableArgumentCloning()
                    ->disallowMockingUnknownTypes()
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
                    ->disallowMockingUnknownTypes()
                    ->setMethods(empty($methods) ? null : $methods)
                    ->getMock();
	}
}