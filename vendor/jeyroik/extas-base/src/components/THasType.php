<?php
namespace extas\components;

use extas\interfaces\IHasType;

/**
 * Trait THasType
 *
 * @property $config
 *
 * @package extas\components
 * @author jeyroik@gmail.com
 */
trait THasType
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->config[IHasType::FIELD__TYPE] ?? '';
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type)
    {
        $this->config[IHasType::FIELD__TYPE] = $type;

        return $this;
    }
}
