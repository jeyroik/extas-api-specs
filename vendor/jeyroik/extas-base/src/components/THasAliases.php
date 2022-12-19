<?php
namespace extas\components;

use extas\interfaces\IHasAliases;

/**
 * Trait THasAliases
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasAliases
{
    /**
     * @return array
     */
    public function getAliases(): array
    {
        return $this->config[IHasAliases::FIELD__ALIASES] ?? [];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasAlias(string $name): bool
    {
        $aliases = $this->getAliases();

        return in_array($name, $aliases);
    }

    /**
     * @param array $aliases
     * @return $this
     */
    public function setAliases(array $aliases)
    {
        $this->config[IHasAliases::FIELD__ALIASES] = $aliases;

        return $this;
    }

    /**
     * @param string $alias
     * @return $this
     */
    public function addAlias(string $alias)
    {
        $aliases = $this->getAliases();
        $aliases[] = $alias;

        return $this->setAliases($aliases);
    }

    /**
     * @param string $alias
     * @return $this
     */
    public function removeAlias(string $alias)
    {
        $aliases = $this->getAliases();
        $byName = array_flip($aliases);

        if (isset($byName[$alias])) {
            unset($byName[$alias]);
            $this->setAliases(array_keys($byName));
        }

        return $this;
    }
}
