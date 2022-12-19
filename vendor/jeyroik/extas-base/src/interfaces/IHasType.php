<?php
namespace extas\interfaces;

/**
 * Interface IHasType
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasType
{
    public const FIELD__TYPE = 'type';

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type);
}
