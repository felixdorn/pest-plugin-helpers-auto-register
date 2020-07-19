<?php


namespace Felix\AutoHelpers;


use BadMethodCallException;
use PHPUnit\Framework\TestCase;

class AutoHelpers extends TestCase
{
    /** @var string[] */
    private $__helpers;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->__helpers = (new HelpersLocator(
            __DIR__ . '/../tests/Helpers.php'
        ))->find();
    }

    public function __call($name, $arguments)
    {
        if (in_array($name, $this->__helpers, true)) {
            return $name(...$arguments);
        }

        throw new BadMethodCallException(sprintf(
            'Method %s::%s does not exist.', TestCase::class, $name
        ));
    }
}
