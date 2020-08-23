<?php

declare(strict_types=1);

namespace Felix\AutoHelpers;

use BadMethodCallException;
use Closure;
use Pest\TestSuite;
use PHPUnit\Framework\TestCase;

/** @noRector Rector\SOLID\Rector\Class_\FinalizeClassesWithoutChildrenRector */
class RegistersHelpers extends TestCase
{
    /** @var string[] */
    private $__helpers;

    /**
     * @param mixed[] $data
     * @param string  $dataName
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->__helpers = (new HelpersLocator(
            TestSuite::getInstance()->rootPath . '/tests/Helpers.php'
        ))->find();
    }

    /**
     * @param mixed[] $arguments
     *
     * @return mixed
     */
    public function __call(string $name, $arguments)
    {
        if (is_callable($name) && in_array($name, $this->__helpers, true)) {
            return Closure::fromCallable($name)->bindTo($this)(...$arguments);
        }

        throw new BadMethodCallException(sprintf('Method %s::%s does not exist.', TestCase::class, $name));
    }
}
