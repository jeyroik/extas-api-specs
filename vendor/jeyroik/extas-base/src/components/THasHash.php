<?php
namespace extas\components;

use extas\interfaces\IHasHash;

/**
 * Trait THasHash
 *
 * @property array $config
 *
 * @package extas\components
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasHash
{
    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->config[IHasHash::FIELD__HASH] ?? '';
    }

    /**
     * @param string $hash
     * @return $this
     */
    public function setHash(string $hash)
    {
        $this->config[IHasHash::FIELD__HASH] = $hash;

        return $this;
    }
}
