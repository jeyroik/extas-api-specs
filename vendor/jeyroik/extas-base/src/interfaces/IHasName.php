<?php
namespace extas\interfaces;

/**
 * Interface IHasName
 *
 * @package extas\interfaces
 * @author jeyroik@gmail.com
 */
interface IHasName
{
    public const FIELD__NAME = 'name';

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name);
}
