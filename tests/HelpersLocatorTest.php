<?php

use Felix\AutoHelpers\HelpersLocator;

it('can locate helpers', function () {
    $locator = new HelpersLocator(
        __DIR__ . '/fixtures/Helpers.php'
    );

    assertEquals(['helper1'], $locator->find());
});
