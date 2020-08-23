<?php

declare(strict_types=1);

namespace Felix\AutoHelpers;

use BadMethodCallException;
use Pest\TestSuite;
use PHPUnit\Framework\TestCase;

/** @noRector Rector\SOLID\Rector\Class_\FinalizeClassesWithoutChildrenRector */
class AutoHelpers extends TestCase
{
    /** @var string[] */
    private $__helpers;

    /**
     * AutoHelpers constructor.
     *
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
            return $name(...$arguments);
        }

        throw new BadMethodCallException(sprintf('Method %s::%s does not exist.', TestCase::class, $name));
    }
}
