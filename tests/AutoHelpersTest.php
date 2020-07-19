<?php

it('can register an helper to the test case', function () {
    assertTrue(
        $this->_someHelper(1, 1)
    );
});

test('a helper can be an high order test')
    ->assertAutoHelpersWorks();
