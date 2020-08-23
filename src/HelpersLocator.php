<?php

declare(strict_types=1);

namespace Felix\AutoHelpers;

use Delight\ExtendedTokens\ExtendedTokens;

final class HelpersLocator
{
    /** @var string */
    private $code;

    public function __construct(string $file)
    {
        if (!file_exists($file)) {
            $this->code = '';

            return;
        }

        $content = file_get_contents($file);

        if ($content === false) {
            $content = '';
        }

        $this->code = $content;
    }

    /**
     * @return string[]
     */
    public function find(): array
    {
        $functions = array_map(function ($token) {
            return $token[1];
        }, array_filter(
            (new ExtendedTokens())->parse($this->code),
            function ($token): bool {
                return $token[0] === T_FUNCTION_NAME;
            }
        ));

        return array_unique(
            array_values($functions)
        );
    }
}
