<?php

namespace Fooman\PhpunitBridge;

require_once __DIR__ . '/__function.php';

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Code\Generator\Io;
use Magento\Framework\Filesystem\Driver\File;
use Magento\Framework\TestFramework\Unit\Autoloader\ExtensionAttributesGenerator;
use Magento\Framework\TestFramework\Unit\Autoloader\ExtensionAttributesInterfaceGenerator;
use Magento\Framework\TestFramework\Unit\Autoloader\FactoryGenerator;
use Magento\Framework\TestFramework\Unit\Autoloader\GeneratedClassesAutoloader;

class Magento2UnitTestSetup
{
    private $hasRun = false;

    public function run()
    {
        if (!$this->hasRun) {
            $this->setupGenerators();
            $this->hasRun = true;
        }
    }

    public function setupGenerators()
    {
        if (!defined('TESTS_TEMP_DIR')) {
            define('TESTS_TEMP_DIR', dirname(dirname(__DIR__)) . '/var');
        }

        $generatorIo = new Io(
            new File(),
            TESTS_TEMP_DIR . '/' . DirectoryList::getDefaultConfig()[DirectoryList::GENERATED_CODE][DirectoryList::PATH]
        );
        $generatedCodeAutoloader = new GeneratedClassesAutoloader(
            [
                new ExtensionAttributesGenerator(),
                new ExtensionAttributesInterfaceGenerator(),
                new FactoryGenerator(),
            ],
            $generatorIo
        );
        spl_autoload_register([$generatedCodeAutoloader, 'load']);
    }

}