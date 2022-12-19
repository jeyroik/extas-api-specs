<?php
namespace extas\interfaces;

/**
 * Interface IHasHash
 *
 * @package extas\interfaces
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IHasHash
{
    public const FIELD__HASH = 'hash';

    /**
     * @return string
     */
    public function getHash(): string;

    /**
     * @param string $hash
     * @return $this
     */
    public function setHash(string $hash);
}
