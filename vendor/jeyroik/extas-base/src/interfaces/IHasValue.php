<?php
namespace extas\interfaces;

/**
 * Interface IHasValue
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasValue
{
    public const FIELD__VALUE = 'value';

    /**
     * @param mixed $default
     *
     * @return mixed
     */
    public function getValue($default = null);

    /**
     * @param mixed $value
     *
     * @return $this
     */
    public function setValue($value);
}
