<?php
namespace extas\components;

use extas\interfaces\IHasPriority;

/**
 * Trait THasPriority
 *
 * @property array $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasPriority
{
    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->config[IHasPriority::FIELD__PRIORITY] ?? 0;
    }

    /**
     * @param int $priority
     * @return $this
     */
    public function setPriority(int $priority)
    {
        $this->config[IHasPriority::FIELD__PRIORITY] = $priority;

        return $this;
    }
}
