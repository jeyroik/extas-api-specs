<?php
namespace extas\components;

use extas\interfaces\IHasName;

/**
 * Trait THasName
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasName
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->config[IHasName::FIELD__NAME] ?? '';
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->config[IHasName::FIELD__NAME] = $name;

        return $this;
    }
}
