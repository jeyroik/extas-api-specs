<?php
namespace tests;

/**
 * Class EmptyClass
 *
 * @package tests
 * @author jeyroik <jeyroik@gmail.com>
 */
class EmptyClass
{
    /**
     * @param mixed ...$args
     * @return string
     */
    public function __invoke(...$args): string
    {
        return 'is ok: ' . implode(', ', $args);
    }
}
