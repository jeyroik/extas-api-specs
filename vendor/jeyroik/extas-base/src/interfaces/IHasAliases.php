<?php
namespace extas\interfaces;

/**
 * Interface IHasAliases
 *
 * @package extas\interfaces
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IHasAliases
{
    public const FIELD__ALIASES = 'aliases';

    /**
     * @return array
     */
    public function getAliases(): array;

    /**
     * @param string $name
     * @return bool
     */
    public function hasAlias(string $name): bool;

    /**
     * @param array $aliases
     * @return $this
     */
    public function setAliases(array $aliases);

    /**
     * @param string $alias
     * @return $this
     */
    public function addAlias(string $alias);

    /**
     * @param string $alias
     * @return $this
     */
    public function removeAlias(string $alias);
}
