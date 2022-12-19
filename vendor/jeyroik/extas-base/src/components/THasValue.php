<?php
namespace extas\components;

use extas\interfaces\IHasValue;

/**
 * Trait THasValue
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasValue
{
    /**
     * @param mixed $default
     *
     * @return mixed
     */
    public function getValue($default = null)
    {
        return $this->config[IHasValue::FIELD__VALUE] ?? $default;
    }

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->config[IHasValue::FIELD__VALUE] = $value;

        return $this;
    }
}
