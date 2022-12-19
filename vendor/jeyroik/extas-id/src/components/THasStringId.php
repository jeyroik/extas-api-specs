<?php
namespace extas\components;

use extas\interfaces\IHaveStringId;

/**
 * Trait THasStringId
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasStringId
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->config[IHaveStringId::FIELD__ID] ?? '';
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setId(string $name): self
    {
        $this->config[IHaveStringId::FIELD__ID] = $name;

        return $this;
    }
}
