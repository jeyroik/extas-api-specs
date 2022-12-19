<?php
namespace extas\interfaces;

/**
 * Interface IHasPriority
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasPriority
{
    public const FIELD__PRIORITY = 'priority';

    /**
     * @return int
     */
    public function getPriority(): int;

    /**
     * @param int $priority
     * @return $this
     */
    public function setPriority(int $priority);
}
