<?php

function _someHelper(int $a, int $b)
{
    return $a === $b;
}

function assertAutoHelpersWorks()
{
    assertTrue(true);
}
